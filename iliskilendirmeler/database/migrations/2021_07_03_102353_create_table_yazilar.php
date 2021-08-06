<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableYazilar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yazilar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->text('icerik');
            $table->unsignedBigInteger('user_id');/* yazilar tarafında kullanıcıyı bulmak için user-id adında bir sütun oluşturcam bu sütun içerisine de kullanıcının id sini girecez */
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users'); /* üstteki belirttiğimiz user_id yi alıyoruz users tablosundaki id değerini referans alacak */
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
