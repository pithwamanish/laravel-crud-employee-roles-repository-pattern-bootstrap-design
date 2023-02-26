<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //First Name,Last Name,Email,Profile image,Birthdate,Current Address,Permenant Address, Role
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 35);
            $table->string('last_name', 35);
            $table->string('profile_image_path', 200);
            $table->date('birthdate');
            $table->string('current_address', 200);
            $table->string('permanent_address', 200);
            $table->string('email', 150)->unique();
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
        Schema::dropIfExists('employees');
    }
}
