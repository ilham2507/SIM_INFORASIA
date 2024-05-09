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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('role_id')->nullable();
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->string('name');
            $table->string('nip');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->string('alamat');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
