<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lot_id')->unsigned(); // lots table
            $table->foreign('lot_id')->references('id')->on('lots');
            $table->string('sequence', 8);
            $table->dateTime('reception_started', 0);
            $table->dateTime('reception_ended', 0);
            $table->unsignedInteger('workforce');
            $table->foreignId('supplier_id')->unsigned(); // suppliers table
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->string('supplier_name', 50);
            $table->string('boat_name', 50);
            $table->string('truck_number_plate', 50);
            $table->foreignId('species_id'); // species table
            $table->foreignId('origin_city_id'); // cities table
            $table->unsignedInteger('number_of_cases');
            $table->decimal('quantity_received', 25, 2);
            $table->decimal('quantity_weighted', 25, 2);
            $table->foreignId('caliber_id'); // calibers table
            $table->string('onp_ticket_serial', 60);
            $table->set('status', ['reception', 'calibration', 'production', 'tunnel', 'packing', 'storage'])->default('reception');
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
        Schema::dropIfExists('receptions');
    }
}
