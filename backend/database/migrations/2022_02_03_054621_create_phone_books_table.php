<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directory_phonebooks', function (Blueprint $table) {
            $table->id();
            $table->string('family');
            $table->string('name');
            $table->string('middle_name');
            $table->string('phone');
            $table->bigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')->on('directory_categories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directory_phonebooks');
    }
}
