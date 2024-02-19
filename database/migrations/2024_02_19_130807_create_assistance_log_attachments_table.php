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
        Schema::create('assistance_log_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid();
            $table->unsignedBigInteger('assistance_log_id');
            $table->string('file');
            $table->timestamps();
        });

        Schema::table('assistance_log_attachments', function (Blueprint $table) {
            $table->foreign('assistance_log_id')->references('id')->on('assistance_logs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistance_log_attachments');
    }
};
