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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('views')->default(0);
            $table->string('slug')->nullable();
            $table->boolean('displayed')->default(true);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->smallInteger('order')->unsigned()->default(0)->nullable();

            // Define a FK referenciando o próprio id da tabela
            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
