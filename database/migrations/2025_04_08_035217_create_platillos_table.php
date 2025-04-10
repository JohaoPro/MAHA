<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('platillos', function (Blueprint $table) {
            $table->id('id_platillo');
            $table->string('nombre'); 
            $table->boolean('disponibilidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('platillos');
    }
};
