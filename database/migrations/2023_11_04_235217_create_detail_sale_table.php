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
        Schema::create('detail_sale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sale');
            $table->foreign("id_sale")
                ->references("id")
                ->on("sale")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->unsignedBigInteger('id_product');
            $table->foreign("id_product")
                ->references("id")
                ->on("product")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->decimal('price',8,2);
            $table->integer('quantity');
            $table->decimal('subtotal',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sale');
    }
};
