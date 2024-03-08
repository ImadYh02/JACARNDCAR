<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id_car');
            $table->string('name_car');
            $table->string('desc_car');
            $table->boolean('is_available')->default(0);
            $table->double('price_car');
            $table->string('img_car');
            $table->string('model_car');
            $table->string('marque_car');
            $table->string('type_car');
            $table->unsignedInteger('id_category');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
