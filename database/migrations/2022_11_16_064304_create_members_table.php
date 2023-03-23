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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mbr_usr_id');
            $table->unsignedBigInteger('mbr_gender_id')->nullable();
            $table->unsignedBigInteger('mbr_type_id');
            $table->unsignedBigInteger('mbr_prv_id')->nullable();
            $table->unsignedBigInteger('mbr_cit_id')->nullable();
            $table->string('mbr_national_code',10)->nullable();
            $table->string('mbr_birthday',10)->nullable();
            $table->string('mbr_tele_phone',11)->nullable();
            $table->string('mbr_post_code',20)->nullable();
            $table->string('mbr_address',500)->nullable();
            $table->string('mbr_referer_code',20)->nullable();
            $table->timestamps();

            $table->foreign('mbr_usr_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mbr_gender_id')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->foreign('mbr_type_id')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->foreign('mbr_prv_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('mbr_cit_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
