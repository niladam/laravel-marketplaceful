<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->text('feature_image_path')->nullable();
            $table->timestamps();
        });

        Schema::create('listings_tags', function (Blueprint $table) {
            $table->integer('listing_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->integer('order_column')->unsigned()->nullable();

            $table->unique(['listing_id', 'tag_id']);

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}
