<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetadataToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->schemalessAttributes('public_metadata');
            $table->schemalessAttributes('private_metadata');
            $table->schemalessAttributes('internal_metadata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            //
        });
    }
}
