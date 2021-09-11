<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.error'), function (Blueprint $table) {

            $exceptionsTable = config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.exception');
            $exceptionsKey = app(config('laravel-exceptions.models.exception'))->getKeyName();
            $exceptionReference = (string) Str::of($exceptionsTable)->singular()->append('_')->append($exceptionsKey);

            $table->string('id')->unique();
            $table->string($exceptionReference);
            $table->foreign($exceptionReference)->references($exceptionsKey)->on($exceptionsTable)->onDelete('cascade');
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