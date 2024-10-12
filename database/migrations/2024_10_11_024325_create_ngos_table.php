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
            $table->string('name'); // NGO name
            $table->string('description')->nullable(); // Description of the NGO
            $table->string('email')->unique(); // NGO's contact email
            $table->string('password')->nullable();
            $table->string('contact_number')->nullable(); // Contact phone number
            $table->string('website')->nullable(); // NGO's official website
            $table->string('facebook_link')->nullable(); // Facebook page link
            $table->string('twitter_link')->nullable(); // Twitter profile link
            $table->string('instagram_link')->nullable(); // Instagram profile link
            $table->string('address')->nullable(); // Street address
            $table->string('city')->nullable(); // City
            $table->string('state')->nullable(); // State or region
            $table->string('country')->nullable(); // Country
            $table->string('zip_code')->nullable(); // Postal/zip code
            $table->string('amazon_wishlist_link')->nullable(); // Amazon wishlist link for donations
            $table->string('logo')->nullable(); // NGO's logo
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
