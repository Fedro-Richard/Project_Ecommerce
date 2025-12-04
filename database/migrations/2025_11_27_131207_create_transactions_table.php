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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // 2. DATA BARANG
            $table->string('item_name'); // Contoh: "Choco Chip"
            $table->integer('qty');      // Jumlah: 2
            $table->decimal('total_price', 15, 2); // Total: 30000.00

            // 3. DATA PENGIRIMAN (Snapshot)
            // Kita simpan lagi Nama & Alamat di sini.
            // Kenapa? Karena jika User pindah rumah (update tabel user), 
            // data transaksi lama ini tidak boleh ikut berubah (harus tetap alamat lama).
            $table->string('customer_name');
            $table->text('customer_address'); 
            $table->string('customer_phone')->nullable(); // Ambil dari phone_number user

            // 4. PEMBAYARAN
            $table->string('payment_method'); // 'COD' atau 'TRANSFER'
            $table->string('payment_proof')->nullable(); // Nama file gambar
            
            // 5. STATUS
            $table->string('status')->default('pending'); // pending, paid, shipped, done
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
