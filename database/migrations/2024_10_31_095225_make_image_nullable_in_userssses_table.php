<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('userssses', function (Blueprint $table) {
            $table->string('image')->nullable()->change(); // Make image nullable
        });
    }

    public function down()
    {
        Schema::table('userssses', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change(); // Revert back if necessary
        });
    }
};
