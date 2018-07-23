<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
class UsersController extends Controller
{
    public function show(User $user)
    {
        $this->authorize('show', $user);
        return view('frontend.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('frontend.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->all();
        //if ($request->avatar) {
        //    $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
        //    if ($result) {
        //        $data['avatar'] = $result['path'];
        //    }
        //}
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }

    public function pwdEdit(User $user)
    {
        $this->authorize('update', $user);
        return view('frontend.user.password', compact('user'));
    }

    public function pwdUpdate(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->all();
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
