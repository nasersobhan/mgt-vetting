<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->string('fullname');
            $table->date('dateofbirth');
            $table->enum('gender', ['male','female'])->default('male');
            
            $table->string('familyGroup');
            $table->string('email')->nullable();;
            $table->string('phone')->nullable();;

            $table->string('passportNumber')->nullable();
            $table->string('tazkiraNumber')->nullable();
            $table->string('marriageCertificate')->nullable();

            $table->string('destinationCountry')->default('Unknow');
            $table->string('caseType')->default('Unknow');
            $table->tinyint('caseApproved')->default(0);
            $table->text('caseDetials')->nullable();

            $table->date('arrivalDate')->nullable();
            $table->date('leaveDate')->nullable();
            $table->date('covid19VaccineDate')->nullable();
            $table->date('interviewDate')->nullable();
            $table->date('uaeBiometricDate')->nullable();

            $table->integer('city');
            $table->integer('cluster');
            $table->integer('block');
            $table->integer('floor');
            $table->integer('room');
            $table->softDeletes();
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
        Schema::dropIfExists('people');
    }
}
