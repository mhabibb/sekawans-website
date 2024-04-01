<?php

use App\Models\District;
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
        Schema::create('satellite_health_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(District::class);
            $table->string('name', 64)->unique();
            $table->string('url_map', 255)->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('satellite_health_facilities');
    }
};