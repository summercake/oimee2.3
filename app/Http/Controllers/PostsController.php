<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Auth;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, Post $post)
    {
        $posts = $post->withOrder($request->order)->paginate(30);
        return view('frontend.post.index', compact('posts'));
    }

    public function create(Post $post)
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('frontend.post.create-and-edit', compact('post', 'user', 'categories'));
    }

    public function store(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();
        $user = Auth::user();
        return redirect()->to($post->link())->with('user')->with('message', 'Created successfully.');
    }

    public function show(Request $request, Post $post)
    {
        // URL 矫正
        if ( ! empty($post->slug) && $post->slug != $request->slug) {
            return redirect($post->link(), 301);
        }

        return view('frontend.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $user = Auth::user();
        $categories = Category::all();
        return view('frontend.post.create-and-edit', compact('post', 'user', 'categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->all());
        return redirect()->to($post->link())->with('success', '成功更新！');
    }

    public function destroy(Post $post)
    {
        $this->authorize('destroy', $post);
        $post->delete();
        return redirect()->route('posts.manage', Auth::id())->with('success', '成功删除！');
    }

    public function list(User $user)
    {
        $posts = Post::where('user_id', '=', Auth::id())->get();
        return view('frontend.post.list', compact('user', 'posts'));
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => '',
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg'] = "上传成功!";
                $data['success'] = true;
            }
        }
        return $data;
    }
}
