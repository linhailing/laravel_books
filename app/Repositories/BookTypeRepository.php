<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/20
 * Time: 14:45
 */
namespace App\Repositories;

use App\Models\BookType;

class BookTypeRepository{
    public static function getTree(){
        $data = BookType::all()->toArray();
        $ret = [ '0' => '请选择'];
        if(!empty($data)){
            foreach ($data as $item){
                $ret[$item['id']] = $item['name'];
            }
        }
        return $ret;
    }
}