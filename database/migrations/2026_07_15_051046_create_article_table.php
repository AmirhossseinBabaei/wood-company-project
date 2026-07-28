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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('article_category_id');
            $table->foreign('article_category_id')->references('id')->on('article_categories');

            $table->string('image');
            
            $table->string('fa_title');
            $table->string('en_title');

            $table->string('fa_summery');
            $table->string('en_summery');

            $table->string('fa_content');
            $table->string('en_content');

            $table->enum('status', ['active', 'inactive']);

            $table->integer('view_count');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
