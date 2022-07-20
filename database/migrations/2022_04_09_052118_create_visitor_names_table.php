<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_names', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visitor_id')->unsigned();
            $table->string('v_name',100);
            $table->string('v_email')->nullable();
            $table->string('v_contact',20);
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
        Schema::dropIfExists('visitor_names');
    }
}
