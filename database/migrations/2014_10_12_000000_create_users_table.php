<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 150);
            $table->string('username', 25)->unique();
            $table->string('email')->unique();
            $table->foreignId('jabatan_pegawai_id');
            $table->enum('hak_akses', ['Administrator', 'Bendahara', 'Pembukuan', 'Sales', 'Manajer', 'Owner', 'User']);
            $table->tinyInteger('aktif');
            $table->string('avatar');
            $table->text('alamat_user')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
