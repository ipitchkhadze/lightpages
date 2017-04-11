<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->default(0);
            $table->integer('lang_id')->unsigned();
            $table->string('name');
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();
            $table->tinyInteger('state', false, true);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('pages', function($table) {
            $table->foreign('lang_id')->references('id')->on('lang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('pages');
    }

}
