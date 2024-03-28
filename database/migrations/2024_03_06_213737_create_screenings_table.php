<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningsTable extends Migration
{
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->boolean('agreement')->default(false);
            $table->string('contact'); 
            $table->string('gender', 10); 
            $table->unsignedSmallInteger('age'); 
            $table->string('district', 50); 
            $table->date('screening_date');
            $table->boolean('home_contact')->default(false);
            $table->boolean('close_contact')->default(false);
            $table->boolean('cough')->default(false);
            $table->boolean('breath')->default(false);
            $table->boolean('sweat')->default(false);
            $table->boolean('fever')->default(false);
            $table->boolean('weight_loss')->default(false);
            $table->boolean('pregnant')->default(false);
            $table->boolean('elderly')->default(false);
            $table->boolean('diabetes')->default(false);
            $table->boolean('smoking')->default(false);
            $table->boolean('ever_treatment')->default(false);
            $table->string('contact1_name', 100)->nullable(); 
            $table->string('contact1_number', 20)->nullable(); 
            $table->string('contact2_name', 100)->nullable(); 
            $table->string('contact2_number', 20)->nullable();
            $table->string('contact3_name', 100)->nullable(); 
            $table->string('contact3_number', 20)->nullable(); 
            $table->boolean('is_positive')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('screenings');
    }
}

