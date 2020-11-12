<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturedToListingsTable extends Migration
{
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->boolean('featured')->default(false);
        });
    }
}
