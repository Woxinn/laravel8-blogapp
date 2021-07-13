<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Yazilar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazilar', function (Blueprint $table) {
            $table->id();
            $table->integer('sahipid');
            $table->integer('kategoriid');
            $table->enum('onecikarilmis',['1','0'])->default('0');
            $table->text('baslik');
            $table->longText('icerik');
            $table->string('slug');
            $table->string('resim');
            $table->string('etiketler');
            $table->integer('okunmasayisi');
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
        Schema::dropIfExists('yazilar');
    }
}
