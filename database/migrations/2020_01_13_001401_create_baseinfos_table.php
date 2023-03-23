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
        Schema::create('baseinfos', function (Blueprint $table) {
            $table->id();
            $table->string('bas_type');
            $table->string('bas_value');
            $table->string('bas_grand_parent_id')->nullable();
            $table->string('bas_parent_id')->nullable();
            $table->string('bas_can_user_add')->default(0);
            $table->string('bas_extra_value')->nullable();
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
        Schema::dropIfExists('baseinfos');
    }
};
