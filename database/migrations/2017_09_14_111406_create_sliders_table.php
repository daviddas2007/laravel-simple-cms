<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sliders', function ($table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('url', 100)->nullable();
            $table->integer('group_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->nullable();
            $table->enum('status', ['activate', 'deactivate'])->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            //$table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_sliders');
    }
}
