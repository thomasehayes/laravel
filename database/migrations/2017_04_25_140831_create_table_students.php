<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudents extends Migration
{

    public function up()
    {
        // create or modify tables
        Schema::create(/* table name */'students', /* a function */ function(Blueprint $table) {
            $table->increments('id'); // id INT NOT AUTO_INCREMENT
            $table->string('first_name', 300); // first_name VARCHAR(300) NOT NULL
            $table->string('description')->nullable(); // description VARCHAR(255)
            // Audit columns created_at, updated_at DATETIME
            $table->timestamps(); // will create created_at and updated_at


        });
    }

    public function down()
    {
        // drop tables, or undo changes
        Schema::drop('students');
    }
}
