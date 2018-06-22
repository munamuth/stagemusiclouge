<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_background')->default('transparent');
            $table->string('header_text')->default('transparent');
            $table->string('header_border_top')->default('transparent');
            $table->string('header_border_bottom')->default('transparent');
            $table->string('header_text_hover')->default('transparent');

            $table->string('footer_background')->default('transparent');
            $table->string('footer_text')->default('transparent');
            $table->string('footer_border_top')->default('transparent');

            $table->string('bottom_background')->default('transparent');
            $table->string('bottom_border_top')->default('transparent');
            $table->string('bottom_text')->default('transparent');
            $table->string('logo')->default('logo.png');
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
        Schema::dropIfExists('styles');
    }
}
