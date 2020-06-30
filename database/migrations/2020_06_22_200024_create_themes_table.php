<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('version');
            $table->string('preview_url');

            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');

            $table->string('screenshot_url');
            $table->integer('rating');
            $table->integer('num_ratings');
            $table->integer('downloaded')->nullable();
            $table->string('last_updated')->nullable();
            $table->string('homepage')->nullable();
            $table->text('description')->nullable();
            $table->string('template')->nullable();
            $table->string('download_link')->nullable();
            $table->json('tags')->nullable();
            $table->string('checksum', 255)->nullable();
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
        Schema::dropIfExists('themes');
    }
}
