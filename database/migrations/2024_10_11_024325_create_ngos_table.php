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
        Schema::create('ngos', function (Blueprint $table) {
            $table->id();
            $table->string('ngo_name'); // NGO name
            $table->string('ngo_reg_no')->nullable();
            $table->text('description')->nullable(); // Description of the NGO
            $table->string('ngo_start_date')->nullable(); // ngo_start_date
            $table->string('logo')->nullable(); // NGO's logo / Icon
            $table->string('email')->nullable(); // NGO's contact email
            $table->text('contact_number')->nullable(); // Multiple Contact number
            $table->text('address')->nullable(); // Full address
            $table->longText('banner_images')->nullable(); // Banner Images multiples
            $table->string('website')->nullable(); // NGO's official website
            $table->string('facebook_link')->nullable(); // Facebook page link
            $table->string('twitter_link')->nullable(); // Twitter profile link
            $table->string('instagram_link')->nullable(); // Instagram profile link
            $table->string('youtube_link')->nullable(); // Youtube profile link
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngos');
    }
};
