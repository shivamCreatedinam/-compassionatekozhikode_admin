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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title'); // Blog name
            $table->text('description')->nullable();
            $table->string('blog_start_date')->nullable(); 
            $table->string('added_by')->nullable(); 
            $table->longText('blog_images')->nullable(); // Blog Images multiples
            $table->string('facebook_link')->nullable(); // Facebook page link
            $table->string('twitter_link')->nullable(); // Twitter profile link
            $table->string('instagram_link')->nullable(); // Instagram profile link
            $table->string('youtube_link')->nullable(); // Youtube profile link
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
