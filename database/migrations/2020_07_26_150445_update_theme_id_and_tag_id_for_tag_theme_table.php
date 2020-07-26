<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateThemeIdAndTagIdForTagThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_theme', function (Blueprint $table) {
            $table->bigInteger('theme_id')->unsigned()->index()->change();
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->bigInteger('tag_id')->unsigned()->index()->change();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
