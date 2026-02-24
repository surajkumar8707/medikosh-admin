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
        // Schema::create('social_media_links', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('youTube')->nullable();
        //     $table->string('instagram')->nullable();
        //     $table->string('facebook')->nullable();
        //     $table->string('linkedin')->nullable();
        //     $table->string('twitter')->nullable();
        //     $table->timestamp('created_at')->useCurrent();
        //     $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        // });

        Schema::create('social_media_links', function (Blueprint $table) {
            $table->id();
            $table->string('youTube')->nullable();
            $table->boolean('youTube_show')->default(true);

            $table->string('instagram')->nullable();
            $table->boolean('instagram_show')->default(true);

            $table->string('facebook')->nullable();
            $table->boolean('facebook_show')->default(true);

            $table->string('linkedin')->nullable();
            $table->boolean('linkedin_show')->default(true);

            $table->string('twitter')->nullable();
            $table->boolean('twitter_show')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_links');
    }
};
