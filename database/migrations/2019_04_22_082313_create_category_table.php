<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id'); // создаёт первичный ключ уникальный с автоинкрементом 
            $table->string('alias')->comment('друженственный URL');
            $table->string('name')->comment('название категории');
            $table->integer('category_id')->nullable();
            $table->timestamps(); // создаёт два поля с датами создания и изменения, которые заполняются автоматически
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
