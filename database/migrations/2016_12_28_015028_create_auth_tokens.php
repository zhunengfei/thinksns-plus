<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token', 255)->comment('验证token');
            $table->string('refresh_token', 255)->comment('刷新token');
            $table->integer('user_id')->comment('token所属用户id');
            $table->integer('expires')->nullable()->default(0)->comment('token生命周期,秒为单位');
            $table->tinyInteger('state')->nullalble()->default(1)->comment('token状态1:在线,0:下线');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('auth_tokens');
    }
}