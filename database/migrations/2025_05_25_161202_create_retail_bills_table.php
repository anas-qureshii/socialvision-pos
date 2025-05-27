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
        Schema::create('retail_bills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 15);
            $table->string('email')->nullable();
            $table->date('bill_date');
            $table->integer('discount')->default(0);
            $table->decimal('deposit_amount', 10, 2)->default(0);
            $table->json('items_data');
            $table->decimal('custom_price', 10, 2)->default(0);
            $table->decimal('bill', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retail_bills');
    }
};
