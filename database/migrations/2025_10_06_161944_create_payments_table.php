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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('method')->default('bank_transfer'); // bank_transfer, cash, etc.
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('bank_account')->nullable();
            $table->string('reference')->nullable();
            $table->string('receipt_path')->nullable(); // path file bukti transfer
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
