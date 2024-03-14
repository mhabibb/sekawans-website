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
            $table->enum('contact_with_tb', ['Ya', 'Tidak']);
            $table->enum('batuk', ['Ya', 'Tidak']);
            $table->enum('sesak_nafas', ['Ya', 'Tidak']);
            $table->enum('keringat_malam_hari', ['Ya', 'Tidak']);
            $table->enum('demam_meriang', ['Ya', 'Tidak']);
            $table->enum('ibu_hamil', ['Ya', 'Tidak']);
            $table->enum('lansia', ['Ya', 'Tidak']);
            $table->enum('diabetes_melitus', ['Ya', 'Tidak']);
            $table->enum('merokok', ['Ya', 'Tidak']);
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