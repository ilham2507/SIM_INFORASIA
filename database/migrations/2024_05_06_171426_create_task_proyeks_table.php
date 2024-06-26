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
        Schema::create('task_proyeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_id')->references('id')->on('proyeks')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('penerimaProyek_id')->references('id')->on('penerima_proyeks')->onDelete('cascade');
            $table->string('tugas');
            $table->longText('catatan');
            $table->string('pekerja');
            $table->date('start');
            $table->date('deadline');
            $table->string('status');
            $table->integer('nilai');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_proyeks');
    }
};
