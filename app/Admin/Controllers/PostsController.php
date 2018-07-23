<?php

namespace App\Admin\Controllers;

use App\Models\Post;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PostsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('文章列表');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('编辑文章');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Post::class, function (Grid $grid){
            $grid->model()->orderBy('created_at', 'desc');
            $grid->id('ID')->sortable();
            $grid->title('文章标题');
            $grid->user_id('作者');
            $grid->category_id('分类');
            $grid->tag_id('标签');
            $grid->reply_count('回复总数');
            $grid->view_count('浏览总数');
            $grid->last_reply_user_id('最后回复');
            $grid->order('排序')->editable();
            $grid->excerpt('摘要');
            $grid->validation('审核')->editable('select', [0 => '否', 1 => '是']);
            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('修改时间')->sortable();
            // 不在页面显示 `新建` 按钮，因为我们不需要在后台新建用户
            $grid->disableCreateButton();
            $grid->actions(function ($actions) {
                // 不在每一行后面展示删除按钮
                $actions->disableDelete();
                // 不在每一行后面展示编辑按钮
                $actions->disableEdit();
            });
            $grid->tools(function ($tools){
                // 禁用批量删除按钮
                $tools->batch(function ($batch){
                    $batch->disableDelete();
                });
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Post::class, function (Form $form) {
            $form->display('order', '排序');
            $form->display('validation', '审核');
        });
    }
}
