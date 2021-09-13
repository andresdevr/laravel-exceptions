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
            $table->uuid('id')->primary(); 
            $table->string('error_id');
            $table->foreign('error_id')->references('id')->on(config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.error'))->onDelete('cascade');
            $table->text('markdown_explanation')->nullable();
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