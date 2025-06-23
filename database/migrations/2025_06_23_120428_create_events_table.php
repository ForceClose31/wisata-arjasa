<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->string('location');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->json('status');
            $table->json('type');
            $table->foreignId('category_id')->constrained('event_categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
