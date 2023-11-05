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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()
            // ->foreign('user_id')
            ->references('id')
            ->on('users');
           // ->onUpdate('CASCADE')
           // ->onDelete('CASCADE');
            $table->string('ime')->nullable();
            $table->text('fcm_token')->nullable();
            $table->string('type')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
