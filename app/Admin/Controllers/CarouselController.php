<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/20
 * Time: 0:52
 * 轮播设置控制
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class CarouselController extends Controller{
    use ModelForm;
    public function index(){
        return Admin::content(function (Content $content){
            $content->header('轮播列表');
            $content->description('轮播列表');
            $content->breadcrumb(
                ['text' => '首页', 'url'=> '/'],
                ['text' => '轮播管理', 'url'=> '/carousel'],
                ['text' => '轮播列表']
            );
            $content->body($this->grid());
        });
    }
    public function create(){
        return Admin::content(function (Content $content){
            $content->header('轮播列表');
            $content->description('轮播列表');
            $content->breadcrumb(
                ['text' => '首页', 'url'=> '/'],
                ['text' => '轮播管理', 'url'=> '/carousel'],
                ['text' => '轮播新增']
            );
            $content->body($this->form());
        });
    }
    public function edit($id){
        return Admin::content(function (Content $content) use($id){
            $content->header('轮播列表');
            $content->description('轮播列表');
            $content->breadcrumb(
                ['text' => '首页', 'url'=> '/'],
                ['text' => '轮播管理', 'url'=> '/carousel'],
                ['text' => '轮播编辑']
            );
            $content->body($this->form()->edit($id));
        });
    }

    public function form(){
        return Admin::form(\App\Models\Carousel::class, function (Form $form){
            $form->text('title', '轮播标题');
            $form->image('image', '图片')->uniqueName();
            $form->url('url', '连接地址');
            $form->textarea('intro', '描述');
            $form->radio('position', '显示位置')->options([
                '1' => '顶部',
                '2' => '中间',
                '3' => '底部'
            ])->default(1);
            $form->radio('position_type', '显示位置')->options([
                '1' => '首页',
                '2' => '其他'
            ])->default(1);
            $form->number('ordersort', '排序')->default(255);
            $form->radio('status', '是否显示')->options([
                '0' => '隐藏',
                '1' =>'显示'
            ])->default(1);
            $form->datetime('expiration_time', '到期时间')->default(time());
        });
    }
    public function grid(){
        return Admin::grid(\App\Models\Carousel::class, function (Grid $grid){
            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->image('图片');
            $grid->expiration_time('有效时间');
            $grid->created_at('创建时间');
        });
    }
}