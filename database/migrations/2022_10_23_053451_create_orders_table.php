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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('ordered_at');
            $table->date('finished_at')
                ->nullable();
            $table->unsignedInteger('total')
                ->default(0)
                ->comment('subtotal harga');
            $table->unsignedInteger('down_payment')
                ->default(0)
                ->comment('uang muka');
            $table->unsignedInteger('payment')
                ->default(0)
                ->comment('pembayaran');
            $table->unsignedInteger('change')
                ->default(0)
                ->comment('kembalian');
            $table->string('payment_status')
                ->default('partial')
                ->comment('
                    status pembayaran:
                        pending     (belum ada pembayaran),
                        partial     (sudah ada dp),
                        paid        (lunas)
                ');
            $table->string('order_status')
                ->default('todo')
                ->comment('
                    status pesanan: 
                        todo        (pesanan masuk),
                        in_progress (sedang dikerjakan),
                        done        (cucian selesai),
                        completed   (pesanan diambil),
                ');
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers');
            $table->foreignId('user_id')
                ->constrained('users')
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
        Schema::dropIfExists('orders');
    }
};
