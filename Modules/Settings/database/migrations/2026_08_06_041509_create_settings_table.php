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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('fa_website_name')->nullable();
            $table->text('fa_website_description')->nullable();

            $table->string('en_website_name')->nullable();
            $table->text('en_website_description')->nullable();

            $table->string('logo_src')->nullable();
            $table->string('favicon')->nullable();
            $table->string('footer_logo')->nullable();

            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();

            $table->string('fa_address')->nullable();
            $table->string('en_address')->nullable();

            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();

            $table->string('en_owner_full_name')->nullable();
            $table->string('en_owner_bio')->nullable();
            $table->string('en_hero_title')->nullable();

            $table->string('fa_owner_full_name')->nullable();
            $table->string('fa_owner_bio')->nullable();
            $table->string('fa_hero_title')->nullable();

            $table->string('owner_avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
