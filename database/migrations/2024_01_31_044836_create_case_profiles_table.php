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
        Schema::create('case_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('case_category_id');
            $table->unsignedBigInteger('abuse_category_id')->nullable();
            $table->unsignedBigInteger('abuse_subcategory_id')->nullable();
            $table->unsignedBigInteger('complainant_id');
            $table->unsignedBigInteger('respondent_id');
            $table->unsignedBigInteger('received_by_id');
            $table->unsignedBigInteger('assessed_by_id')->nullable();
            $table->unsignedBigInteger('relationship_id');
            $table->string('case_profile_id');
            $table->timestamps();
        });

        Schema::table('case_profiles', function (Blueprint $table) {
            $table->foreign('case_category_id')->references('id')->on('case_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('abuse_category_id')->references('id')->on('abuse_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('abuse_subcategory_id')->references('id')->on('abuse_subcategories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('complainant_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('respondent_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('received_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('assessed_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('relationship_id')->references('id')->on('relationships')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_profiles');
    }
};
