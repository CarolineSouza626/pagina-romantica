<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('secret_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('clue')->nullable();
            $table->longText('cipher_text');
            $table->longText('revealed_text');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_hidden')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('secret_cards');
    }
};
