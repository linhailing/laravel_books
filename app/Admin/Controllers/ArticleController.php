<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/19
 * Time: 19:22
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\ArticleTypeRepository;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ArticleController extends Controller{
    use ModelForm;
    public function index(){
        return Admin::content(function (Content $content){
            $content->header('新闻管理');
            $content->description('新闻管理');
            $content->breadcrumb(
                ['text' => '首页', 'url' => '/'],
                ['text' => '新闻资讯', 'url' => '/articles'],
                ['text' => '新闻列表']
            );
            $content->body($this->grid());
        });
    }

    public function create(){
        return Admin::content(function (Content $content){
            $content->header('新闻添加');
            $content->description('新闻添加');
            $content->breadcrumb(
                ['text' => '首页', 'url' => '/'],
                ['text' => '新闻资讯', 'url' => '/articles'],
                ['text' => '新闻添加']
            );
            $content->body($this->form());
        });
    }
    public function edit($id){
        return Admin::content(function (Content $content) use($id){
            $content->header('新闻修改');
            $content->description('新闻修改');
            $content->breadcrumb(
                ['text' => '首页', 'url' => '/'],
                ['text' => '新闻资讯', 'url' => '/articles'],
                ['text' => '新闻修改']
            );
            $content->body($this->form()->edit($id));
        });
    }
    protected  function grid(){
        return Admin::grid(\App\Models\Article::class, function (Grid $grid){
            $grid->id('编号')->sortable();
            $grid->title('标题');
            $grid->image('图片')->display(function ($img){
                $path = 'http://local.book.com/uploads/'.$img;
                return '<img height="50px" width="50px" src='.$path.'>';
            });
            $grid->recommend('是否推荐')->display(function ($key){
                $articleRepository = new ArticleRepository();
                return $articleRepository->getRecommend($key);
            });
            $grid->status('是否发布')->display(function ($key){
                $articleRepository = new ArticleRepository();
                return $articleRepository->getStatus($key);
            });
            $grid->created_at('创建时间');
        });
    }
    protected function form(){
        return Admin::form(\App\Models\Article::class, function (Form $form){
            $articleType = new ArticleTypeRepository();
            $form->text('title', '标题');
            $form->select('type_id','文章类型')->options($articleType->getTree())->default(0);
            $form->image('image','文章图片');
            $form->text('author', '作者');
            $form->text('source', '文章来源');
            $form->url('source_url', '来源地址');
            $form->textarea('description', '文章描述');
            $form->editor('content',"文章描述");
            $form->radio('recommend', '是否推荐')->options(['0' => '否', '1'=> '是'])->default(0);
            $form->datetime('publish_time','发布时间');
            $form->radio('status', '是否发布')->options(['1' => '显示', '0'=> '隐藏'])->default(1);
        });
    }
}