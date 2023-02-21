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
            $table->string('nama', 150);
            $table->string('panggilan', 150)->nullable();
            $table->string('username', 25)->unique();
            $table->string('email')->unique();
            $table->enum('status', ['Staff', 'Harian Lepas']);
            $table->tinyInteger('aktif');
            $table->string('avatar');
            $table->text('alamat')->nullable();
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
