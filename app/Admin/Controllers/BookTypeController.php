<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/20
 * Time: 14:46
 * 图书类型管理
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class BookTypeController extends Controller{
    use ModelForm;
    public function index(){
        return Admin::content(function (Content $content){
            $content->header('图书类型管理');
            $content->breadcrumb(
                ['text' =>'首页', 'url'=>'/'],
                ['text' => '图书类型管理', 'url' => '/book_type'],
                ['text' => '图书类型类别']
            );
            $content->description('图书类型管理');
            $content->body($this->grid());
        });
    }
    public function create(){
        return Admin::content(function (Content $content){
            $content->header('图书类型创建');
            $content->breadcrumb(
                ['text' =>'首页', 'url'=>'/'],
                ['text' => '图书类型管理', 'url' => '/book_type'],
                ['text' => '图书类型创建']
            );
            $content->description('图书类型创建');
            $content->body($this->form());
        });
    }
    public function edit($id){
        return Admin::content(function (Content $content) use($id){
            $content->header('图书类型编辑');
            $content->breadcrumb(
                ['text' =>'首页', 'url'=>'/'],
                ['text' => '图书类型管理', 'url' => '/book_type'],
                ['text' => '图书类型编辑']
            );
            $content->description('图书类型编辑');
            $content->body($this->form()->edit($id));
        });
    }
    public function grid(){
        return Admin::grid(\App\Models\BookType::class, function (Grid $grid){
            $grid->id('ID')->sortable();
            $grid->name('分类名称');
            $grid->pid('所属分类');
            $grid->status('状态');
            $grid->ordersort('排序');
            $grid->created_at('创建时间');
        });
    }
    public function form(){
        return Admin::form(\App\Models\BookType::class, function (Form $form){
            $form->text('name', '分类名称');
            $form->select('pid', '所属分类')->options(\App\Repositories\BookTypeRepository::getTree());
            $form->textarea('description','介绍');
            $form->radio('status', '状态')->options([0 => '隐藏', 1 => '显示'])->default(1);
            $form->number('ordersort','排序')->default(255);
        });
    }
}