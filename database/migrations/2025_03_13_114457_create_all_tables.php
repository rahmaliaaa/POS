<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabel m_supplier
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_kode', 10);
            $table->string('supplier_nama', 100);
            $table->string('supplier_alamat', 255);
            $table->timestamps();
        });

        // Tabel m_kategori
        Schema::create('m_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_kode', 10);
            $table->string('kategori_nama', 100);
            $table->timestamps();
        });

        // Tabel m_barang
        Schema::create('m_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('m_kategori')->onDelete('cascade');
            $table->string('barang_kode', 10);
            $table->string('barang_nama', 100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();
        });

        // Tabel m_level
        Schema::create('m_level', function (Blueprint $table) {
            $table->id();
            $table->string('level_kode', 10);
            $table->string('level_nama', 100);
            $table->timestamps();
        });

        // Tabel m_user
        Schema::create('m_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->constrained('m_level')->onDelete('cascade');
            $table->string('username', 20)->unique();
            $table->string('nama', 100);
            $table->string('password', 255);
            $table->timestamps();
        });

        // Tabel t_stok
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('m_supplier')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('m_barang')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('m_user')->onDelete('cascade');
            $table->dateTime('stok_tanggal');
            $table->integer('stok_jumlah');
            $table->timestamps();
        });

        // Tabel t_penjualan
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('m_user')->onDelete('cascade');
            $table->string('pembeli', 50);
            $table->string('penjualan_kode', 20);
            $table->dateTime('penjualan_tanggal');
            $table->timestamps();
        });

        // Tabel t_penjualan_detail
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')->constrained('t_penjualan')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('m_barang')->onDelete('cascade');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
        Schema::dropIfExists('t_penjualan');
        Schema::dropIfExists('t_stok');
        Schema::dropIfExists('m_barang');
        Schema::dropIfExists('m_kategori');
        Schema::dropIfExists('m_supplier');
        Schema::dropIfExists('m_user');
        Schema::dropIfExists('m_level');
    }
};
