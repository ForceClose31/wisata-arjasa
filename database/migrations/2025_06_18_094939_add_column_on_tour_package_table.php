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
        Schema::table('tour_packages', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('name');
            // $table->string('duration')->default('3 Hari 2 Malam')->after('price');
            $table->integer('min_person')->default(2)->after('duration');
            $table->json('highlights')->nullable()->after('excludes');
            $table->string('website_url')->nullable()->after('is_available');
            $table->json('phone_numbers')->nullable()->after('website_url');
            $table->boolean('is_featured')->default(false)->after('phone_numbers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
