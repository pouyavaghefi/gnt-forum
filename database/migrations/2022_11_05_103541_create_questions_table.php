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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('que_title',70);
            $table->string('que_slug',100)->nullable()->unique();
            $table->text('que_body');
            $table->bigInteger('upvotes')->default(0);
            $table->bigInteger('downvotes')->default(0);
            $table->tinyInteger('que_private')->default(0)->comment('private = 1 , public = 0');
            $table->tinyInteger('que_edited')->default(0)->comment('edited = 1 , not edited = 0');
            $table->unsignedBigInteger('que_creator_id');
            $table->unsignedBigInteger('que_moderator_id')->nullable();
            $table->unsignedBigInteger('que_remover_id')->nullable();
            $table->integer('que_view_count')->default(0);
            $table->string('que_str',10)->unique();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('que_creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('que_moderator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('que_remover_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
