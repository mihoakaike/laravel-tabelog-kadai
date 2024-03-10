<?php

namespace App\Admin\Controllers;

use App\Models\Store;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StoreController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Store';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Store());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('category.name', __('Category Name'));
        $grid->column('name', __('Name'));
        $grid->column('img1', __('Img1'))->image();
        $grid->column('img2', __('Img2'))->image();
        $grid->column('img3', __('Img3'))->image();
        $grid->column('description', __('Description'));
        $grid->column('opening_time', __('Opening time'))->sortable();
        $grid->column('closing_time', __('Closing time'))->sortable();
        $grid->column('lowest_price', __('Lowest price'))->sortable();
        $grid->column('highest_price', __('Highest price'))->sortable();
        $grid->column('post_code', __('Post code'));
        $grid->column('address', __('Address'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('holiday', __('Holiday'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function($filter) {
            $filter->in('category.name','カテゴリー')->multipleSelect(Category::all()->pluck('name', 'id'));
            $filter->like('name','店舗名');
            $filter->between('lowest_price','価格（最低）');
            $filter->between('highest_price','価格（最高）');
            $filter->between('created_at','登録日')->datetime();
            $filter->between('update_at','更新日')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Store::findOrFail($id));

        $show->field('id', __('Id'));
        $show->column('category.name', __('Category Name'));
        $show->field('name', __('Name'));
        $show->field('img1', __('Img1'))->image();
        $show->field('img2', __('Img2'))->image();
        $show->field('img3', __('Img3'))->image();
        $show->field('description', __('Description'));
        $show->field('opening_time', __('Opening time'));
        $show->field('closing_time', __('Closing time'));
        $show->field('lowest_price', __('Lowest price'));
        $show->field('highest_price', __('Highest price'));
        $show->field('post_code', __('Post code'));
        $show->field('address', __('Address'));
        $show->field('phone_number', __('Phone number'));
        $show->field('holiday', __('Holiday'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Store());

        $form->select('category_id', __('Category Name'))->options(Category::all()->pluck('name', 'id'));
        $form->text('name', __('Name'));
        $form->text('img1', __('Img1'));
        $form->text('img2', __('Img2'));
        $form->text('img3', __('Img3'));
        $form->textarea('description', __('Description'));
        $form->time('opening_time', __('Opening time'))->default(date('H:i:s'));
        $form->time('closing_time', __('Closing time'))->default(date('H:i:s'));
        $form->number('lowest_price', __('Lowest price'));
        $form->number('highest_price', __('Highest price'));
        $form->text('post_code', __('Post code'));
        $form->text('address', __('Address'));
        $form->text('phone_number', __('Phone number'));
        $form->checkbox('holiday', __('Holiday'))->options(Store::DAY_OF_WEEK);

        return $form;
    }
}
