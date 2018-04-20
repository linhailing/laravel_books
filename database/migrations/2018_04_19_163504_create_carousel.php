<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarousel extends Migration
{
    /**
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(50) DEFAULT '',
        `file` varchar(255) DEFAULT '',
        `chaining` varchar(255) DEFAULT '' COMMENT '跳转链接',
        `postion` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '位置，1.顶部，2.中间',
        `postion_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '位置类型,1.首页',
        `range` int(10) DEFAULT '1' COMMENT '排序值,越小越靠前',
        `display` tinyint(4) DEFAULT '1' COMMENT '是否显示，0.否，1.是',
        `expiration_time` timestamp NULL DEFAULT NULL COMMENT '到期时间',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('轮播标题');
            $table->string('image')->comment('轮播图片');
            $table->string('url')->comment('跳转链接');
            $table->string('description')->comment('描述');
            $table->integer('position')->comment('位置，1.顶部，2.中间,3.底部')->default(1);
            $table->integer('position_type')->comment('位置类型,1.首页,2.其他')->default(1);
            $table->integer('ordersort')->comment('排序值,越大越靠前')->default(255);
            $table->integer('status')->comment('是否显示，0.否，1.是')->default(1);
            $table->dateTime('expiration_time')->comment('到期时间');
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
        Schema::dropIfExists('carousel');
    }
}
