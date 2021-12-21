<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee', function(Blueprint $table)
		{
			$table->increments('int_emp_id');
			$table->string('int_emp_name', 100)->nullable();
			$table->string('int_emp_pref_name', 100)->nullable();
			$table->string('int_emp_email', 100)->nullable();
			$table->string('int_emp_email_nap', 100)->nullable();
			$table->string('int_emp_department', 100)->nullable();
			$table->string('int_emp_position', 100)->nullable();
			$table->string('int_emp_reportline', 25)->nullable();
			$table->timestamps(6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employee');
	}

}
