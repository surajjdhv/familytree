<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_relation', function (Blueprint $table) {
            $table->unsignedBigInteger('first_person_id')
                ->references('id')
                ->on('persons');
            $table->unsignedBigInteger('second_person_id')
                ->references('id')
                ->on('persons');
            $table->unsignedBigInteger('relation_id')
                ->references('id')
                ->on('relations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_relation');
    }
}
