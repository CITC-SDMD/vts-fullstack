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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('barangay_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('contact_no')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->integer('age')->nullable();
            $table->enum('civil_status', ['single', 'married', 'widowed', 'divorced']);
            $table->string('educ_attain')->nullable();
            $table->string('home_address');
            $table->string('work_address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('other_occupation')->nullable();
            $table->string('file')->nullable();
            $table->enum('ethnicity', ['non-ip', 'ip', 'muslim'])->nullable();
            $table->boolean('is_4ps_beneficiary')->nullable();
            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('barangay_id')->references('id')->on('barangays')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
