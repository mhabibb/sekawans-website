<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->boolean('cough_two_weeks')->default(false)->after('screening_date');
            $table->boolean('shortness_breath')->default(false)->after('cough_two_weeks');
            $table->boolean('night_sweats')->default(false)->after('shortness_breath');
            $table->boolean('fever_one_month')->default(false)->after('night_sweats');
            $table->boolean('incomplete_tb_treatment')->default(false)->after('ever_treatment');
        });

        DB::statement('UPDATE screenings SET
            cough_two_weeks = cough,
            shortness_breath = breath,
            night_sweats = sweat,
            fever_one_month = fever,
            incomplete_tb_treatment = CASE WHEN tb_diagnosed = "b" THEN 1 ELSE ever_treatment END
        ');

        Schema::table('screenings', function (Blueprint $table) {
            $table->dropColumn([
                'cough',
                'tb_diagnosed',
                'home_contact',
                'close_contact',
                'weight_loss',
                'breath',
                'fever',
                'sluggish',
                'sweat',
                'ever_treatment'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->boolean('cough')->default(false)->after('screening_date');
            $table->enum('tb_diagnosed', ['a', 'b', 'c'])->default('c')->after('cough');
            $table->boolean('home_contact')->default(false)->after('tb_diagnosed');
            $table->boolean('close_contact')->default(false)->after('home_contact');
            $table->boolean('weight_loss')->default(false)->after('close_contact');
            $table->boolean('fever')->default(false)->after('weight_loss');
            $table->boolean('breath')->default(false)->after('fever');
            $table->boolean('sluggish')->default(false)->after('breath');
            $table->boolean('sweat')->default(false)->after('sluggish');
            $table->boolean('ever_treatment')->default(false)->after('sweat');
        });

        DB::statement('UPDATE screenings SET
            cough = cough_two_weeks,
            breath = shortness_breath,
            sweat = night_sweats,
            fever = fever_one_month,
            ever_treatment = incomplete_tb_treatment,
            tb_diagnosed = "c"
        ');

        Schema::table('screenings', function (Blueprint $table) {
            $table->dropColumn([
                'cough_two_weeks',
                'shortness_breath',
                'night_sweats',
                'fever_one_month',
                'incomplete_tb_treatment'
            ]);
        });
    }
};
