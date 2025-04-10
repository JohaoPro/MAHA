<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedido_platillo', function (Blueprint $table) {
            $table->id('id_pedido_platillo');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_platillo');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('id_platillo')->references('id_platillo')->on('platillos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedido_platillo');
    }
};