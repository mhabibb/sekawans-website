<?php

use App\Models\Patient;
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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class);
            $table->timestamp('meeting_date');
            $table->string('status_ro')->nullable();
            $table->string('status_ro_other')->nullable();
            $table->string('contact_method');
            $table->string('contact_reason');
            $table->string('kie_given');
            $table->string('berat_badan');
            $table->string('kondisi_mental');
            $table->string('efek_samping_obat')->nullable();
            $table->string('efek_samping_obat_other')->nullable();
            $table->string('persepsi_pasien')->nullable();
            $table->string('persepsi_pasien_other')->nullable();
            $table->string('penyakit_penyerta');
            $table->string('bantuan_sosial')->nullable();
            $table->string('bantuan_sosial_other')->nullable();
            $table->string('hasil_pendampingan');
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
        Schema::dropIfExists('meetings');
    }
};