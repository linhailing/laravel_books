<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/20
 * Time: 14:48
 * 图书信息管理
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\BookTypeRepository;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class BooksController extends Controller{
    use ModelForm;
    public function index(){
        return Admin::content(function (Content $content){
            $content->header('图书信息管理');
            $content->breadcrumb(
                ['text' =>'首页', 'url'=>'/'],
                ['text' => '图书信息管理', 'url' => '/books'],
                ['text' => '图书信息列表']
            );
            $content->description('图书信息列表');
            $content->body($this->grid());
        });
    }
    public function create(){
        return Admin::content(function (Content $content){
            $content->header('图书信息管理');
            $content->breadcrumb(
                ['text' =>'首页', 'url'=>'/'],
                ['text' => '图书信息管理', 'url' => '/books'],
                ['text' => '图书信息创建']
            );
            $content->description('图书信息创建');
            $content->body($this->form());
        });
    }
    public function edit($id){
        return Admin::content(function (Content $content) use($id){
            $content->header('图书信息管理');
            $content->breadcrumb(
                ['text' =>'首页', 'url'=>'/'],
                ['text' => '图书信息管理', 'url' => '/books'],
                ['text' => '图书信息修改']
            );
            $content->description('图书信息修改');
            $content->body($this->form()->edit($id));
        });
    }
    public function grid(){
        return Admin::grid(\App\Models\Book::class, function (Grid $grid){
            $grid->disableFilter();
            $grid->disableRowSelector();
            $grid->id('ID')->sortable();
            $grid->isbn('ISBN');
            $grid->book_name('图书名称');
            $grid->image('图片')->display(function ($img){
                $path = '/uploads/'.$img;
                return '<img src="'.$path.'" width="100px" height="100px">';
            });
            $grid->isbn10('ISBN10');
            $grid->douban_grade('豆瓣评分');
            $grid->grade('平台评分');
        });
    }
    public function form(){
        return Admin::form(\App\Models\Book::class, function (Form $form){
            $bookTypeRepository = BookTypeRepository::getTree();
            $form->text('book_name', '图书名称');
            $form->number('isbn', 'ISBN')->addElementClass('number');
            $form->number('isbn10', 'ISBN10')->addElementClass('number');
            $form->select('type_id', '图书类型')->options($bookTypeRepository)->default(0);
            $form->image('image','图书图片')->uniqueName();
            $form->text('origin_name', '图书原名')->default('暂无');
            $form->text('author', '作者');
            $form->text('translator','译者')->default('暂无');
            $form->text('press', '出版社');
            $form->datetime('publish_time', '出版时间');
            $form->number('count_page','总页码')->addElementClass('number');
            $form->number('price', '图书价格')->addElementClass('number');
            $form->number('douban_grade','豆瓣评分')->addElementClass('number');
            $form->number('douban_grade_number','豆瓣评分人数')->addElementClass('number');
            $form->number('grade','评分')->addElementClass('number');
            $form->number('grade_number','评分人数')->addElementClass('number');
            $form->radio('is_concern', '是否受关注')->options(['0'=> '否', '1' =>'关注'])->default(0);
            $form->radio('is_recommend', '是否推荐')->options(['0'=> '否', '1' =>'推荐'])->default(0);
            $form->radio('is_new', '是否新书')->options(['1'=> '新书', '2' =>'否'])->default(1);
            $form->radio('is_sell_well', '是否畅销')->options(['1'=> '畅销', '0' =>'否'])->default(0);
            $form->editor('summary','图书介绍');
        });
    }
}