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
        Schema::create(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.solution'), function (Blueprint $table) {

            $errorsTable = config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.error');
            $errorsKey = app(config('laravel-exceptions.models.error'))->getKeyName();
            $errorReference = (string) Str::of($errorsTable)->singular()->append('_')->append($errorsKey);

            $table->string('id')->unique();
            $table->string($errorReference);
            $table->foreign($errorReference)->references($errorsKey)->on($errorsTable)->onDelete('cascade');
            $table->string('user_id')->nullable();
            $table->text('markdown_explanation');
            $table->enum('can_be_replicated', [
                'yes',
                'no',
                'maybe'
            ]);
            $table->string('commit_track')->nullable();
            $table->json('extra_data')->nullable();
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
        Schema::dropIfExists(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.solution'));
    }
}