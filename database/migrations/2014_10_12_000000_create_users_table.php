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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agency_id');
            $table->uuid();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('contact_number');
            $table->string('agency_address');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('agency_id')->references('id')->on('referral_agencies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
