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
        Schema::create('public_notices', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->integer('year');
            $table->string('file_path');
            $table->string('label', 255);
            $table->text('short_desc')->nullable();
            $table->date('published_on')->nullable();
            $table->boolean('displayed')->default(true);
            $table->enum('status', ['open', 'close'])->default('open');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_notices');
    }
};
