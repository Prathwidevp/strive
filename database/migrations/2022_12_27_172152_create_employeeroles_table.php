<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeerolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeroles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emp_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('emp_id')->references('id') ->on('employees')->onDelete('cascade');
            $table->foreign('role_id')->references('id') ->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('employeeroles');
    }
}
