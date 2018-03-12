<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pages', function ($table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->longText('content')->nullable();
            $table->string('meta_title', 100)->nullable();
            $table->string('heading', 100)->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('order')->nullable();
            $table->enum('status', ['activate', 'deactivate'])->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_pages');
    }
}
