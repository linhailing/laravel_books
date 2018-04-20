<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/19
 * Time: 23:36
 * 文章仓库
 */
namespace App\Repositories;

class ArticleRepository{
    protected static $recommend = [
        '0' => '<span class="label label-danger">否</span>',
        '1' => '<span class="label label-success">是</span>',
    ];
    public static $status = [
        '0' => '<span class="label label-danger">隐藏</span>',
        '1' => '<span class="label label-success">发布</span>',
    ];
    public static function getRecommend($key = 0){
        return self::$recommend[$key];
    }
    public static function getStatus($key = 0){
        return self::$status[$key];
    }
}