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
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_id');
            $table->foreignId('workunit_id')->constrained('work_units')->onDelete('cascade');
            $table->string('content');
            $table->string('send_via');
            $table->string('category');
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
        Schema::dropIfExists('dispositions');
    }
};
