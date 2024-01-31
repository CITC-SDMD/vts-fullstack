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
        Schema::create('abuse_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('case_category_id');
            $table->string('abuse_type');
            $table->timestamps();
        });

        Schema::table('abuse_categories', function (Blueprint $table) {
            $table->foreign('case_category_id')->references('id')->on('case_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abuse_categories');
    }
};
