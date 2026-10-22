<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modulo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120)->unique();
            $table->string('abreviatura', 7)->unique();
            $table->unsignedSmallInteger('horas')->nullable();
            $table->decimal('creditos', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modulo');
    }
};
