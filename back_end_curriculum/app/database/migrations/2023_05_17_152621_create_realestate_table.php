<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('realestates')){
            Schema::create('realestates', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name',225);
                $table->string('address',255);
                $table->integer('breadth')->unsigned()->nullable();
                $table->string('floor_plan',255)->nullable();
                $table->integer('tenancy_status')->unsigned();
                $table->bigInteger('account_id')->unsigned();
                $table->timestamps();
                $table->foreign('account_id')->references('id')->on('accounts');// 外部キー制約の設定
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realestates', function (Blueprint $table) {
            $table->dropForeign(['account_id']); // 外部キー制約を削除
        });

        Schema::dropIfExists('realestates');
    }

};
