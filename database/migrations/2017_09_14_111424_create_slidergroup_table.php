<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidergroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_slidergroup', function ($table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
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
        Schema::drop('tbl_slidergroup');
    }
}
