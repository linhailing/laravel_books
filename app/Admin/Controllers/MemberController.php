<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/20
 * Time: 17:05
 * 用户信息
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;

class MemberController extends Controller{
    use ModelForm;
    public function index(){
        return Admin::content(function (Content $content){
            $content->header('用户信息');
            $content->breadcrumb(
                ['text' => '会员管理', 'url' =>'member'],
                ['text' => '用户信息']
            );
            $content->description('用户信息');
            $content->body($this->grid());
        });
    }
    public function create(){
        return Admin::content(function (Content $content){
            $content->header('信息创建');
            $content->breadcrumb(
                ['text' => '会员管理', 'url' =>'member'],
                ['text' => '信息创建']
            );
            $content->description('信息创建');
            $content->body($this->form());
        });
    }
    public function edit($id){
        return Admin::content(function (Content $content) use($id){
            $content->header('信息修改');
            $content->breadcrumb(
                ['text' => '会员管理', 'url' =>'member'],
                ['text' => '信息修改']
            );
            $content->description('信息修改');
            $content->body($this->form()->edit($id));
        });
    }
    public function grid(){
        return Admin::grid(\App\Models\Member::class, function (Grid $grid){
            $grid->disableFilter();
            $grid->disableRowSelector();
            $grid->id('ID')->sortable();
            $grid->name('用户名');
            $grid->nick_name('用户昵称');
            $grid->avatar('头像')->display(function($img){
                $path = '/uploads/'.$img;
                return '<img src="'.$path.'" width="80px" height="80px">';
            });
            $grid->foregift('账户余额	');
            $grid->balance('押金');
            $grid->mobile('手机号');
            $grid->cert_status('认证状态');
            $grid->signable('允许登录');
            $grid->disable('是否禁用');
            $grid->is_company('用户类型');
            $grid->created_at('注册时间');
        });
    }
    public function form(){
        return Admin::form(\App\Models\Member::class, function (Form $form){
           $form->text('name', '用户名称');
           $form->text('nick_name','用户昵称');
           $form->image('avatar','用户头像')->uniqueName();
           $form->mobile('mobile','电话号码');
           $form->number('balance','押金')->default(0);
           $form->number('foregift','预存金')->default(0);
           $form->password('password', '密码');
           $form->radio('sex', '性别')->options(['0'=>'保密', '1'=> '男', '2'=>'女'])->default(0);
           $form->datetime('birthday', '生日');
           $form->text('country','国家')->default('中国');
           $form->text('province','省')->default('上海');
           $form->text('city','城市')->default('上海');
           $form->text('salt','信息地址')->default('上海xxx');
           $form->radio('cert_status', '认证状态')->options(['0' =>'未认证', '1'=>'认证'])->default(0);
           $form->radio('disable', '是否禁用')->options(['0' =>'禁用', '1'=>'否'])->default(1);
           $form->radio('signable', '允许登录')->options(['0' =>'否', '1'=>'允许'])->default(1);
           $form->radio('is_company', '用户类型')->options(['0'=> '个人用户', '1' => '公司'])->default(0);
        });
    }
}