<?php

namespace App\Admin\Controllers;

use App\Models\Tag;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TagsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content){

            $content->header('标签列表');
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
        return Admin::content(function (Content $content) use ($id){
            $content->header('编辑标签');
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
        return Admin::content(function (Content $content){

            $content->header('创建标签');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // 创建一个表单
        return Admin::grid(Tag::class, function (Grid $grid){

            $grid->id('ID')->sortable();
            $grid->name('标签名称');
            $grid->discount_count('折扣总数');
            $grid->adv_count('广告总数');
            $grid->post_count('文章总数');
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
        return Admin::form(Tag::class, function (Form $form){
            // 创建一个标签名称
            $form->text('name', '标签名称');
        });
    }

    public function store()
    {
        return $this->form()->store();
    }

    public function update($id)
    {
        return $this->form()->update($id);
    }

}
