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
        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('upf_object_id');
            $table->unsignedBigInteger('upf_object_type_id')->nullable();
            $table->string('upf_path');
            $table->string('upf_uploaded_as');
            $table->string('upf_dimension',15);
            $table->string('upf_option')->nullable();
            $table->string('upf_type',50);
            $table->string('upf_category');
            $table->string('upf_mime_type');
            $table->string('upf_relation_type',40)->nullable();
            $table->string('upf_file_name')->nullable();
            $table->string('upf_file_hash')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('upf_object_type_id')->references('id')->on('baseinfos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploaded_files');
    }
};
