<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('additional_options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('price'); // Цена 
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('additional_options');
    }
};
