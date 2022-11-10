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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->enum('sex', ['laki-laki', 'perempuan']);
            $table->foreignId('education_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('id_card_address');
            $table->foreignId('id_card_district')
                ->constrained('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('id_number', 16)->unique();
            $table->foreignId('religion_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('residence_address');
            $table->foreignId('district_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('phone', 20);
            $table->enum('marital_status', ['menikah', 'belum menikah', 'janda/duda']);
            $table->boolean('has_job');
            $table->string('workplace');
            $table->string('work_address');
            $table->integer('dependent');
            $table->string('mother\'s_name', 50);
            $table->string('father\'s_name', 50);
            $table->string('guardian_phone', 20);
            $table->string('guardian_address');
            $table->foreignId('guardian_district')
                ->constrained('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('emergency_contact_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('patients');
    }
};
