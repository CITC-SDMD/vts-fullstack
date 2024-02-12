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
        Schema::create('respondents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('complainant_id');
            $table->unsignedBigInteger('respondent_id');
            $table->timestamps();
        });

        Schema::table('respondents', function (Blueprint $table) {
            $table->foreign('complainant_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('respondent_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondents');
    }
};
