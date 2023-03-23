<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->tinyInteger('que_bountied')->after('que_view_count')->default(0);
            $table->tinyInteger('que_chosen')->after('que_bountied')->default(0);
            $table->tinyInteger('que_special')->after('que_chosen')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('que_bountied');
            $table->dropColumn('que_chosen');
            $table->dropColumn('que_special');
        });
    }
};
