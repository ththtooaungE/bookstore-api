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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->enum('condition',['as good as new','excellent', 'good', 'fair'])->nullable();
            $table->text('description');
            $table->integer('stock');
            $table->integer('price');
            $table->string('author');
            $table->string('language');
            $table->integer('number_of_pages');
            $table->date('publication_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
