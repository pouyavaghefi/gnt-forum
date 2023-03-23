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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('object_id');
            $table->unsignedBigInteger('object_type');
            $table->unsignedBigInteger('vote_type');
            $table->unsignedBigInteger('object_user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('object_type')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->foreign('vote_type')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->foreign('object_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
};
