<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupHomepassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backup_homepasses', function (Blueprint $table) {
            $table->id();
            $table->string('area_name');
            $table->string('type_hid');
            $table->string('homepassed_id');
            $table->string('project_id');
            $table->string('region');
            $table->string('sub_region');
            $table->string('province');
            $table->string('branch');
            $table->string('city');
            $table->string('district');
            $table->string('sub_district');
            $table->string('postal_code');
            $table->string('home_passed_coordinate');
            $table->string('residence_type');
            $table->string('residence_name');
            $table->string('street_name');
            $table->string('number');
            $table->string('unit');
            $table->string('pop_id');
            $table->string('splitter_id');
            $table->string('splitter_distribution_coordinate');
            $table->string('remark');
            $table->string('remark_2');
            $table->string('rfs_year');
            $table->string('rfs_status');
            $table->dateTime('submission_date');
            $table->dateTime('last_date');
            $table->string('project_name');
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
        Schema::dropIfExists('backup_homepasses');
    }
}
