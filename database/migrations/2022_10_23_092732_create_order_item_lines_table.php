<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('price')
                ->default(0);
            $table->unsignedInteger('quantity')
                ->default(0);
            $table->unsignedInteger('subtotal')
                ->default(0);
            $table->string('description')
                ->nullable();
            $table->foreignId('plan_id')
                ->nullable()
                ->constrained('plans');
            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item_lines');
    }
};
