<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->comment('文章类型id');
            $table->string('title')->comment('文章标题');
            $table->string('author')->comment('文章作者');
            $table->string('source')->comment('文章来源');
            $table->string('source_url')->comment('来源地址');
            $table->string('description')->comment('描述');
            $table->string('image')->comment('图片');
            $table->text('content')->comment('内容');
            $table->integer('recommend')->default(0)->comment('是否推荐 1是，0否');
            $table->dateTime('publish_time')->comment('发布时间');
            $table->integer('status')->default(1)->comment('状态,1显示。0删除');
            $table->timestamps();
        });
        Schema::create('article_type', function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->comment('文章类型名称');
            $table->integer('pid')->default(0)->comment('文章父类id');
            $table->integer('status')->default(1)->comment('状态 1显示 0不显示');
            $table->integer('ordersort')->default(255)->comment('排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_type');
    }
}
