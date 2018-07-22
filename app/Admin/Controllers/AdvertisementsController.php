<?php

namespace App\Admin\Controllers;

use App\Models\Advertisement;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
class AdvertisementsController extends Controller
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

            $content->header('折扣广告列表');
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
        return Admin::content(function (Content $content){

            $content->header('header');
            $content->description('description');
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
        return Admin::grid(Advertisement::class, function (Grid $grid){
            $grid->filter(function ($filter){

                // 去掉默认的id过滤器
                $filter->disableIdFilter();
                // 在这里添加字段过滤器
                $filter->equal('dis_or_adv', 1);
                return $filter;
            });
            $grid->id('ID')->sortable();
            $grid->title('广告名称');
            $grid->category()->name('所属分类')->sortable();
            $grid->title('广告名称');
            $grid->original_price('原始价格')->sortable();
            $grid->final_price('最终价格')->sortable();
            $grid->actual_charge_price('实际价格')->sortable();
            $grid->discount_rate('折扣率')->sortable();
            $grid->promotion_code('折扣码');
            $grid->start_date('开始日期')->sortable();
            $grid->valid_to_date('截止日期')->sortable();
            $grid->display_valid_to_date('显示截止日期')->sortable();
            $grid->like_count('点赞总数')->sortable();
            $grid->view_count('浏览总数')->sortable();
            $grid->validation('审核')->display(function ($value){
                return $value ? '是' : '否';
            });
            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('修改时间')->sortable();
            //$grid->actions(function ($actions) {
            //    $actions->disableDelete();
            //});
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
        return Admin::form(Advertisement::class, function (Form $form){

            $form->display('id', 'ID');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
