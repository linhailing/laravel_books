<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/19
 * Time: 22:01
 * 文章类型管理
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleTypeRepository;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ArticleTypeController extends Controller{
    use ModelForm;
    public function index(){
        return Admin::content(function (Content $content){
            $content->header('新闻类型管理');
            $content->description('新闻类型管理');
            $content->breadcrumb(
                ['text' => '首页', 'url' => '/'],
                ['text' => '新闻资讯', 'url' => '/article_type'],
                ['text' => '新闻类型列表']
            );
            $content->body($this->grid());
        });
    }
    public function create(){
        return Admin::content(function (Content $content){
            $content->header('类型创建');
            $content->description('类型创建');
            $content->breadcrumb(
                ['text' => '首页', 'url' => '/'],
                ['text' => '新闻资讯', 'url' => '/article_type'],
                ['text' => '类型创建']
            );
            $content->body($this->form());
        });
    }
    public function edit($id){
        return Admin::content(function (Content $content) use($id){
            $content->header('类型修改');
            $content->description('类型修改');
            $content->breadcrumb(
                ['text' => '首页', 'url' => '/'],
                ['text' => '新闻资讯', 'url' => '/article_type'],
                ['text' => '类型修改']
            );
            $content->body($this->form()->edit($id));
        });
    }
    protected function grid(){
        return Admin::grid(\App\Models\ArticleType::class,function (Grid $grid){
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableFilter();
            $grid->model()->orderBy('ordersort','desc');
            $grid->id('ID')->sortable();
            $grid->name('类型名称');
            $grid->status('状态')->display(function ($key){
               return ArticleTypeRepository::getStatus($key);
            });
            $grid->ordersort('排序');
            $grid->created_at('创建时间');
        });
    }
    protected function form(){
        return Admin::form(\App\Models\ArticleType::class, function (Form $form){
            $articleType = new ArticleTypeRepository();
            $form->text('name', '类型名称');
            $form->select('pid','所属类型')->options($articleType->getTree())->default(0);
            $form->radio('status', '是否显示')->options([0=>'否',1 => '是'])->default(1);
            $form->number('ordersort','排序')->default(255);
        });
    }
}