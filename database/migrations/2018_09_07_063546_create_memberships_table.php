<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'memberships',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('person_id');
                $table->foreign('person_id')->references('id')->on('people')
                    ->onDelete('cascade');
                $table->unsignedInteger('department_id');
                $table->foreign('department_id')->references('id')->on('departments');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
