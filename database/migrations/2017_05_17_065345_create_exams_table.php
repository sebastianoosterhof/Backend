<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', array('wpthbe', 'pvb', 'og'));
            $table->enum('status', array('undefined', 'yes', 'no', 'requested', 'planned', 'achieved', 'sliding-through', 'determination-list'));
            $table->string('description');
            $table->integer('remark_id')->references('id')->on('remarks');
            $table->datetime('requested_at');
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
        Schema::dropIfExists('exams');
    }
}
