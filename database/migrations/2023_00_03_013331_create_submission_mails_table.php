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
        Schema::create('submission_mails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('as_for');
            $table->string('nik');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('religion');
            $table->string('place_birth');
            $table->date('date_birth');
            $table->string('marriage_status');
            $table->string('nationality');
            $table->string('file_name');
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('submission_mails');
    }
};
