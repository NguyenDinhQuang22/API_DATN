<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_units', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',255)->nullable();
            $table->string('full_name_en',255)->nullable();
            $table->string('short_name',255)->nullable();
            $table->string('short_name_en',255)->nullable();
            $table->string('code_name',255)->nullable();
            $table->string('code_name_en',255)->nullable();
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
        Schema::dropIfExists('administrative_units');
    }
}
