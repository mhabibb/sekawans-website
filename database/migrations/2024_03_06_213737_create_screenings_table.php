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
            $table->string('gender');
            $table->integer('age');
            $table->string('district');
            $table->date('screening_date');
            $table->boolean('home_contact', ['1', '0']);
            $table->boolean('close_contact', ['1', '0']);
            $table->boolean('cough', ['1', '0']);
            $table->boolean('breath', ['1', '0']);
            $table->boolean('sweat', ['1', '0']);
            $table->boolean('fever', ['1', '0']);
            $table->boolean('weight_loss', ['1', '0']);
            $table->boolean('pregnant', ['1', '0']);
            $table->boolean('elderly', ['1', '0']);
            $table->boolean('diabetes', ['1', '0']);
            $table->boolean('smoking', ['1', '0']);
            $table->boolean('ever_treatment', ['1', '0']);
            $table->string('contact1_name');
            $table->string('contact1_number');
            $table->string('contact2_name');
            $table->string('contact2_number');
            $table->string('contact3_name');
            $table->string('contact3_number');
            $table->boolean('is_positive')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_statuses');
    }
}

?>