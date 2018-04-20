# laravel_books

## install laravel-adminlte

```angular2html
1. composer require encore/laravel-admin
2. php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
3. php artisan admin:install
```

## install 集成富文本编辑器wangEditor

````angular2html
先下载前端库文件wangEditor，解压到目录public/vendor/wangEditor-3.0.9。
然后新建组件类app/Admin/Extensions/WangEditor.php。

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class WangEditor extends Field
{
    protected $view = 'admin.wang-editor';

    protected static $css = [
        '/vendor/wangEditor-3.0.9/release/wangEditor.min.css',
    ];

    protected static $js = [
        '/vendor/wangEditor-3.0.9/release/wangEditor.min.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT

var E = window.wangEditor
var editor = new E('#{$this->id}');
editor.customConfig.zIndex = 0
editor.customConfig.uploadImgShowBase64 = true
editor.customConfig.onchange = function (html) {
    $('input[name=\'$name\']').val(html);
}
editor.create()

EOT;
        return parent::render();
    }
}

````