<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/19
 * Time: 22:03
 * 文章类型管理库
 */
namespace App\Repositories;

use App\Models\ArticleType;

class ArticleTypeRepository{
    protected static $status = [
        '0' => '<span class="label label-danger">隐藏</span>',
        '1' => '<span class="label label-success">显示</span>',
    ];
    public static function getStatus($key = 0){
        return self::$status[$key];
    }
    public function getTree(){
        $data = ArticleType::all()->toArray();
        $ret = [ 0 => '请选择'];
        if (!empty($data)){
            foreach ($data as $item){
                $ret[$item['id']] = $item['name'];
            }
        }
        return $ret;
    }
}