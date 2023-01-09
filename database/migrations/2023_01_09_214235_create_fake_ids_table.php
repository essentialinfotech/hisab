<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fake_ids', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('father_name');
            $table->text('mother_name');
            $table->text('dob');
            $table->text('nid_no');
            $table->text('photo');
            $table->text('signature');
            $table->text('village')->nullable();
            $table->text('road')->nullable();
            $table->text('post_office');
            $table->text('zip_code');
            $table->text('police_station');
            $table->text('district');
            $table->text('blood_group');
            $table->text('place_of_birth');
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
        Schema::dropIfExists('fake_ids');
    }
};
