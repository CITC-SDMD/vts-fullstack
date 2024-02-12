<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('case_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('case_profile_id');
            $table->unsignedBigInteger('referred_by_id');
            $table->unsignedBigInteger('referral_agency_id');
            $table->unsignedBigInteger('service_id');
            $table->string('case_log_number');
            $table->timestamps();
        });

        Schema::table('case_logs', function (Blueprint $table) {
            $table->foreign('case_profile_id')->references('id')->on('case_profiles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('referred_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('referral_agency_id')->references('id')->on('referral_agencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_logs');
    }
};
