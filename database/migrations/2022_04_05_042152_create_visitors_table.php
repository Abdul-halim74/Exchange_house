<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('v_company');
            $table->string('v_token')->unique();
            $table->longText('visiting_reason');
            $table->longText('device_carried');
            $table->string('card_no');
            $table->string('floor_no');
            $table->integer('voucher_print')->default(0);
            $table->string('v_start_time');
            $table->string('v_end_time');
            $table->string('bar_code_image')->nullable();
            $table->string('v_image')->nullable();
            $table->integer('request_status')->comment('0:created,1:accept,2:declined,3:forward');
            $table->string('entry_by');
            $table->date('entry_date');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
