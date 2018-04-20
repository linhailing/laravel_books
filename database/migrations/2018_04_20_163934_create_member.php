<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->double('balance', 10 ,2)->default(0.00)->comment('押金');
            $table->double('foregift', 10 ,2)->default(0.00)->comment('预存金');
            $table->smallInteger('sex')->default(0)->comment('性别,0.保密 1.男 2.女');
            $table->text('name', 50)->comment('名称');
            $table->text('nick_name', 50)->comment('真名');
            $table->dateTime('birthday')->comment('生日');
            $table->integer('mobile')->comment('电话')->default(0);
            $table->text('avatar')->comment('头像');
            $table->text('country')->comment('国家');
            $table->text('province')->comment('省');
            $table->text('city')->comment('城市');
            $table->text('salt')->comment('地名');
            $table->integer('cert_status')->comment('认证状态 0.未认证,1.认证')->default(0);
            $table->text('password')->comment('密码');
            $table->integer('disable')->comment('是否禁用 1.否 0.禁用')->default(1);
            $table->integer('signable')->comment('允许登录 1.允许 0.否')->default(1);
            $table->integer('read_num')->comment('读书总计')->default(0);
            $table->integer('invite_num')->comment('邀请总计')->default(0);
            $table->integer('invite_id')->comment('邀请人')->default(0);
            $table->integer('is_company')->comment('用户类型 0.个人用户，1.公司')->default(0);
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
        Schema::dropIfExists('member');
    }
}
