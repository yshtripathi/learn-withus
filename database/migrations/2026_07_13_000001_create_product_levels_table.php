<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id')->index();
            $table->enum('skill_level', ['Beginner', 'Intermediate', 'Advanced', 'Expert'])->nullable();
            $table->string('skill_level_jp', 100)->nullable();
            $table->text('purpose')->nullable();
            $table->text('purpose_jp')->nullable();
            $table->text('learn_info')->nullable();
            $table->text('learn_info_jp')->nullable();
            $table->text('outcome')->nullable();
            $table->text('outcome_jp')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->double('price_jp', 8, 2)->nullable();
            $table->double('price_hk', 8, 2)->nullable();
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
        Schema::dropIfExists('product_levels');
    }
}
