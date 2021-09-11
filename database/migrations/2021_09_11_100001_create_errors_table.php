<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.error'), function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('exception_id');
            $table->foreign('exception_id')->references('id')->on(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.exception'))->onDelete('cascade');
            $table->string('user_id')->nullable();
            $table->longText('serialized_error');
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
        Schema::dropIfExists(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.error'));
    }
}