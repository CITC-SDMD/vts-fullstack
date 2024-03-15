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
        Schema::create('suboccupations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('occupation_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('suboccupations', function (Blueprint $table) {
            $table->foreign('occupation_id')->references('id')->on('occupations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suboccupations');
    }
};
