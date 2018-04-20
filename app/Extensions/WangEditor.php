<?php
/**
 * Created by PhpStorm.
 * User: henry hailing.lin@outlook.com
 * Date: 2018/4/19
 * Time: 20:54
 * 继承wang editor
 */
namespace App\Exceptions;

use Encore\Admin\Form\Field;

class WangEditor extends Field{
    protected $view = 'admin.wang-editor';
    protected static $css = [
        '/vendor/wangEditor-3.1.1/release/wangEditor.min.css',
    ];

    protected static $js = [
        '/vendor/wangEditor-3.1.1/release/wangEditor.min.js',
    ];
    public function render(){
        $name = $this->formatName($this->column);
        $url = url('/admin/upload');
        $_token = csrf_token();
        $this->script = <<<EOT
var E = window.wangEditor
var editor = new E('#{$this->id}');
editor.customConfig.zIndex = 0
//editor.customConfig.uploadImgShowBase64 = true
editor.customConfig.uploadFileName = 'fileName'
// 配置服务器端地址
editor.customConfig.uploadImgServer = "$url"
var _token = "$_token"
editor.customConfig.onchange = function (html) {
    $('input[name=\'$name\']').val(html);
}
editor.customConfig.uploadImgParams = {
    // 如果版本 <=v3.1.0 ，属性值会自动进行 encode ，此处无需 encode
    // 如果版本 >=v3.1.1 ，属性值不会自动 encode ，如有需要自己手动 encode
    _token: "$_token"
}
editor.customConfig.uploadImgHooks = {
    // 如果服务器端返回的不是 {errno:0, data: [...]} 这种格式，可使用该配置
    // （但是，服务器端返回的必须是一个 JSON 格式字符串！！！否则会报错）
    customInsert: function (insertImg, result, editor) {
        // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
        // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
        // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
        var url = result.url
        insertImg(url)
        // result 必须是一个 JSON 格式字符串！！！否则报错
    }
}
editor.create()
EOT;
        return parent::render();
    }

}