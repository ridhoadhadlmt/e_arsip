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
        Schema::create('outgoing_mails', function (Blueprint $table) {
            $table->id();
            $table->string('no_mail')->unique();
            $table->date('date');
            $table->string('characteristic');
            $table->integer('workunit_id');
            $table->integer('category_id');
            $table->string('as_for');
            $table->string('to');
            $table->text('address');
            $table->text('content');
            $table->string('status');
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
        Schema::dropIfExists('outgoing_mails');
    }
};
