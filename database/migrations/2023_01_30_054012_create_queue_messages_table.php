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
        Schema::create('queue_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phonebook_id')->nullable();
            $table->foreignId('message_id');
            $table->string('phone');
            $table->string('name');
            $table->enum('status', ['pending', 'progress', 'success', 'failed']);
            $table->json('response')->nullable();
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
        Schema::dropIfExists('queue_messages');
    }
};
