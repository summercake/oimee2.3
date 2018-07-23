<?php

namespace App\Admin\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
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

            $content->header('广告列表');
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
            $content->header('编辑广告');
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
            $content->header('创建广告');
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
            $grid->model()->orderBy('created_at', 'desc');
            $grid->model()->where('dis_or_adv', '=', 1);
            $grid->id('ID')->sortable();
            $grid->title('广告名称');
            $grid->category()->name('所属分类')->sortable();
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
            $grid->validation('审核')->editable('select', [0 => '否', 1 => '是']);
            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('修改时间')->sortable();
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
        // 创建一个表单
        return Admin::form(Advertisement::class, function (Form $form){

            // 创建类型选择
            $form->select('dis_or_adv', '类型')->options([1 => '广告'])->rules('required');
            // 创建分类标签选择框
            $categories = Category::all('id', 'name')->toArray();
            $data = [];
            foreach ($categories as $category) {
                $data[$category['id']] = $category['name'].'-'.$category['id'];
            }
            $form->select('category_id', '分类标签')->options($data);
            $form->select('company_id', '公司名称')->options($data);
            // 创建一个输入框，第一个参数 title 是模型的字段名，第二个参数是该字段描述
            $form->text('title', '名称')->rules('required');
            $form->text('introduction', '简介')->rules('required');
            $form->editor('description', '描述')->rules('required');
            // 创建一个选择图片的框
            $form->image('cover_image', '封面图片')->removable()->rules('required|image');
            $form->text('link', '链接1')->rules('required');
            $form->text('second_link', '链接2')->rules('required');
            $form->currency('original_price', '原始价格')->symbol('$')->rules('required');
            $form->currency('final_price', '最终价格')->symbol('$')->rules('required');
            $form->currency('actual_charge_price', '实际价格')->symbol('$')->rules('required');
            $form->rate('discount_rate', '折扣率');
            $form->datetimeRange('start_date', 'valid_to_date', '有效期');
            $form->datetime('display_valid_to_date', '实际截止日期')->format('YYYY-MM-DD HH:mm:ss');
            // 创建一组单选框
            $form->radio('validation', '是否通过审核')->options(['1' => '是', '0' => '否'])->default('0');
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
