<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('test_type_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('test_type_id')->references('id')->on('test_types');
            $table->foreign('parent_id')->references('id')->on('tests')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
