<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('identity_number')->nullable()->after('id');
            $table->string('image')->nullable()->after('identity_number');
            $table->string('pob')->nullable()->after('name');
            $table->smallInteger('role_id');
            $table->string('phone')->nullable();
            $table->string('dob')->nullable()->after('pob');
            $table->string('nationality')->nullable()->after('role_id');
            $table->integer('nof')->nullable()->after('nationality');
            $table->string('rent_periode')->nullable()->after('nof');
            $table->string('emergency_contact')->nullable()->after('rent_periode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
