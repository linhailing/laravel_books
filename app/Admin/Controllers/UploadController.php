<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/19
 * Time: 21:19
 * 文件上传
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller{
    public function upload(Request $request){
        $paths = 'admin'.'/'.date('Ymd');
        $path = $request->file('fileName')->storePublicly($paths .'/'.md5(time()));
        $file_url = asset('/uploads/'.$path);
        $data = [
            'errno' => 0,
            'url' => $file_url,
        ];
        return $data;
    }
}