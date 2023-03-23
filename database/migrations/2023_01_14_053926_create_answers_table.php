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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->text('ans_body');
            $table->bigInteger('upvotes')->default(0);
            $table->bigInteger('downvotes')->default(0);
            $table->tinyInteger('ans_edited')->default(0)->comment('edited = 1 , not edited = 0');
            $table->unsignedBigInteger('ans_que_id');
            $table->unsignedBigInteger('ans_ans_parent_id')->nullable();
            $table->unsignedBigInteger('ans_type_id');
            $table->unsignedBigInteger('ans_creator_id');
            $table->unsignedBigInteger('ans_moderator_id')->nullable();
            $table->unsignedBigInteger('ans_remover_id')->nullable();
            $table->string('ans_str',10)->unique();

            $table->foreign('ans_que_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('ans_ans_parent_id')->references('id')->on('answers')->onDelete('cascade');
            $table->foreign('ans_type_id')->references('id')->on('baseinfos')->onDelete('cascade');
            $table->foreign('ans_creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ans_moderator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ans_remover_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
