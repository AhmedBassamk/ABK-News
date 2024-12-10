<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chat_admins', function (Blueprint $table) {

            $table->id();
            $table->foreignId('sender')->nullable();
            $table->foreignId('receiver')->nullable();

            $table->foreign('sender')->references('id')->on('users');
            $table->foreign('receiver')->references('id')->on('users');

            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_admins');
    }
};
