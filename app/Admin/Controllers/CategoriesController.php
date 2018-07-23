<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
class CategoriesController extends Controller
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

            $content->header('分类标签列表');
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
            $content->header('编辑分类标签');
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

            $content->header('创建商品');
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
        return Admin::grid(Category::class, function (Grid $grid){

            $grid->id('ID')->sortable();
            $grid->pid('父级ID');
            //$grid->sid('本级ID');
            $grid->name('分类名称');
            $grid->discount_count('折扣总数');
            $grid->adv_count('广告总数');
            $grid->post_count('文章总数');
            /*$grid->actions(function ($actions) {
                $actions->disableDelete();
            });*/
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
        return Admin::form(Category::class, function (Form $form){

            // 创建一个父级ID
            $form->text('pid', '父级ID')->rules('required');
            // 创建一个本级ID
            //$form->text('sid', '本级ID');
            // 创建一个分类标签名称
            $form->text('name', '分类标签名称');
            //$form->hasOne('categories', 'category 父级详情', function (Form\NestedForm $form) {
            //    $form->text('id', 'ID')->rules('required');
            //    $form->text('name', '父级标签名称')->rules('required');
            //});
            // 定义事件回调，当模型即将保存时会触发这个回调
            //$form->saving(function (Form $form) {
            //    $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price');
            //});
            //$form->saving();
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
