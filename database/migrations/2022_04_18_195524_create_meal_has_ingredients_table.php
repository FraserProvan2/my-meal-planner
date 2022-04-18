<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealHasIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_has_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->string('qty');
            $table->timestamps();

            $table->foreign('meal_id')
                ->references('id')
                ->on('meals')
                ->onDelete('cascade');
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_has_ingredients');
    }
}
