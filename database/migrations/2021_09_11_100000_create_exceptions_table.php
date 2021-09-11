<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('larave-exceptions.database.prefix') . config('laravel-exceptions.database.tables.exception'), function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('message', 300);
            $table->string('code');
            $table->string('file');
            $table->integer('line');
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
        Schema::dropIfExists(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.exception'));
    }
}
