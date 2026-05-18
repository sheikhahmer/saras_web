<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->string('phone', 80)->nullable();
            $table->string('whatsapp_number', 80)->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_url', 512)->nullable();
            $table->string('instagram_url', 512)->nullable();
            $table->string('pinterest_url', 512)->nullable();
            $table->string('twitter_url', 512)->nullable();
            $table->string('youtube_url', 512)->nullable();
            $table->string('snapchat_url', 512)->nullable();
            $table->string('tiktok_url', 512)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
