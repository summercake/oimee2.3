<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->unsigned()->default(0);
            $table->integer('sid')->unsigned()->nullable();
            $table->string('name')->index()->comment('名称');
            $table->integer('discount_count')->default(0)->comment('折扣数');
            $table->integer('adv_count')->default(0)->comment('广告数');
            $table->integer('post_count')->default(0)->comment('文章数');
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
        Schema::dropIfExists('categories');
    }
}
