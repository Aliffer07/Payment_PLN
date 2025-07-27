<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('meter_number');
            $table->integer('kwh_usage');
            $table->decimal('price_per_kwh', 10, 2);
            $table->decimal('total_amount', 12, 2);
            $table->string('invoice_number')->unique();
            $table->string('payment_status')->default('paid');
            $table->string('payment_receipt')->nullable(); // Path to PDF file
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
