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
        Schema::create('assistance_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('case_log_id');
            $table->unsignedBigInteger('user_id');
            $table->text('description');
            $table->enum('status', [
                'Complaint Prepared',
                'Complaint Filed at City Prosecutor’s Office - Dismissed',
                'Complaint Filed at City Prosecutor’s Office - Info Filed',
                'Case Filed at Court - Ongoing',
                'Case Filed at Court - Archived',
                'Case Filed at Court - Dismissed',
                'Terminated',
            ]);
            $table->timestamps();
        });

        Schema::table('assistance_logs', function (Blueprint $table) {
            $table->foreign('case_log_id')->references('id')->on('case_logs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistance_logs');
    }
};
