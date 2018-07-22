<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table){
            $table->increments('id');
            $table->tinyInteger('dis_or_adv')->default(0);
            $table->integer('category_id')->unsigned();
            $table->integer('company_id')->unsigned();
            // adv_tag is used for identifying status of normal, hottest, newest and others
            //$table -> integer('sale_note_id')-> unsigned()->nullable();
            $table->string('title');
            $table->string('introduction')->nullable();
            $table->text('description')->nullable();
            $table->integer('cover_image')->unsigned();
            // adv_link is used for store product official shopping link
            $table->string('link')->nullable();
            // adv_secondary_link is a backup product link
            $table->string('second_link')->nullable();
            $table->decimal('original_price', 8, 2)->nullable();
            $table->decimal('final_price', 8, 2)->nullable();
            $table->decimal('actual_charge_price', 8, 2)->nullable();
            $table->decimal('discount_rate', 8, 2)->nullable();
            $table->string('promotion_code')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('valid_to_date')->nullable();
            $table->datetime('display_valid_to_date')->nullable();
            //
            //$table -> tinyInteger('adv_page_zone_code') -> nullable();
            $table->unsignedInteger('like_count')->default(0);
            $table->unsignedInteger('view_count')->default(0);
            // active_flag is used for identifying status of delete or not
            $table->boolean('validation')->default(false);
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
        Schema::dropIfExists('advertisements');
    }
}
