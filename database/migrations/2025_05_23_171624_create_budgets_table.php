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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_anggaran')->nullable();
            $table->string('judul')->nullable();
            $table->string('sub_judul')->nullable();
            $table->string('sub_sub_judul')->nullable();
            $table->text('uraian')->nullable();
            $table->text('pejabat_penanggung_jawab')->nullable();
            $table->time('waktu_pelaksanaan')->nullable();
            $table->string('volume')->nullable();
            $table->string('satuan')->nullable();
            $table->decimal('harga_satuan', 15, 2)->nullable();
            $table->string('jumlah_anggaran')->nullable();
            $table->decimal('bobot', 10, 2)->nullable();
            $table->decimal('volume_nominal_rr', 15, 2)->nullable();
            $table->string('satuan_rr')->nullable();
            $table->decimal('fisik_rr', 10, 2)->nullable();
            $table->decimal('tertimbang_rr', 10, 2)->nullable();
            $table->decimal('volume_nominal_rf', 15, 2)->nullable();
            $table->string('satuan_rf')->nullable();
            $table->decimal('fisik_rf', 10, 2)->nullable();
            $table->decimal('tertimbang_rf', 10, 2)->nullable();
            $table->decimal('rupiah_rk', 20, 2)->nullable();
            $table->decimal('persentase_rk', 10, 2)->nullable();
            $table->decimal('tertimbang_rk', 10, 2)->nullable();
            $table->decimal('sisa_anggaran', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
