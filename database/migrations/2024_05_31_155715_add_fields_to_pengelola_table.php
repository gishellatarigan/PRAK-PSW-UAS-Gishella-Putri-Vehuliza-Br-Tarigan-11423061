<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPengelolaTable extends Migration
{
    public function up()
    {
        Schema::table('pengelola', function (Blueprint $table) {
            $table->string('nama_pengelola');
            $table->string('nomor_hp');
            $table->string('username')->unique();
            $table->string('password');
        });
    }

    public function down()
    {
        Schema::table('pengelola', function (Blueprint $table) {
            $table->dropColumn(['nama_pengelola', 'nomor_hp', 'username', 'password']);
        });
    }
}
