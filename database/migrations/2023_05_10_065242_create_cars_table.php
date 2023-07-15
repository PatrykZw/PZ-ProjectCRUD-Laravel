<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->enum('make', ['Audi', 'BMW', 'Ford', 'Jaguar', 'Kia', 'Land Rover', 'Lexus', 'Mercedes Benz', 'MINI', 'Nissan', 'SEAT', 'Skoda', 'Toyota', 'Vauxhall', 'Volkswagen', 'Volvo']);
            $table->text('model');
            $table->enum('body_shape', ['Combi', 'Convertible', 'Coupe', 'Estate', 'Hatchback', 'MPV', 'Saloon', 'Sedan', 'SUV']);
            $table->enum('fuel', ['Electric', 'Hybrid', 'Petrol', 'Oil']);
            $table->enum('transmission', ['Automatic', 'Manual']);
            $table->text('engine');
            $table->double('engine_capacity');
            $table->enum('status', ['Fabric', 'Modified']);
            $table->double('day_repayment');
            $table->date('rental_date')->nullable();
            $table->date('return_date')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
