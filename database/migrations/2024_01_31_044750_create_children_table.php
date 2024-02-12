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
        Schema::create('children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('client_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->integer('age');
            $table->enum('civil_status', ['single', 'married', 'widowed', 'divorced']);
            $table->string('educ_level');
            $table->timestamps();
        });

        Schema::table('children', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
