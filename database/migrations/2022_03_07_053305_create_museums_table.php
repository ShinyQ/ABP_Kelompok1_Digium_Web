<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museums', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('background', 100);
            $table->string('panorama', 100);
            $table->text('description');
            $table->string('location', 100);
            $table->string('phone', 100);
            $table->date('year_built')->nullable();
            $table->point('coordinate');
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('museums');
    }
};