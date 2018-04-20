<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //图书类型
        Schema::create('book_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->comment('所属分类')->dafault(0);
            $table->string('name')->comment('分类名称');
            $table->text('description')->comment('分类描述');
            $table->integer('status')->comment('状态,1.显示，0.否')->dafault(1);
            $table->integer('ordersort')->comment('排序 越大越靠前')->dafault(255);
            $table->timestamps();
        });
        //图书信息
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->comment('图书类型id')->dafault(0);
            $table->bigInteger('isbn')->comment('ISBN')->dafault(0);
            $table->bigInteger('isbn10')->comment('ISBN10')->dafault(0);
            $table->string('book_name',50)->comment('图书名称');
            $table->string('origin_name',50)->comment('图书原名');
            $table->string('author',50)->comment('作者');
            $table->string('image')->comment('图片');
            $table->string('translator',50)->comment('译者');
            $table->string('press',50)->comment('出版社');
            $table->dateTime('publish_time')->comment('出版时间');
            $table->integer('count_page')->comment('页数')->dafault(0);
            $table->text('summary')->comment('图书介绍');
            $table->double('price',10,2)->comment('价格');
            $table->integer('douban_grade')->comment('豆瓣评分')->dafault(0);
            $table->integer('douban_grade_number')->comment('豆瓣评分人数')->dafault(0);
            $table->integer('grade')->comment('评分')->dafault(0);
            $table->integer('grade_number')->comment('评分人数')->dafault(0);
            $table->integer('is_concern')->comment('是否受关注 1.关注,2.否')->default(0);
            $table->integer('is_recommend')->comment('是否推荐 1.推荐,2.否')->default(0);
            $table->integer('is_new')->comment('是否新书 1.是,2.否')->default(1);
            $table->integer('is_sell_well')->comment('是否畅销 1.畅销 0.否')->default(0);
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
        Schema::dropIfExists('books');
        Schema::dropIfExists('book_type');
    }
}
