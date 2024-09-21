<?php

use App\Enum\ApplicationStatusEnum;
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
        Schema::create('jobs_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id');
            $table->foreignId('applicant_id');
            $table->string('state')->default(ApplicationStatusEnum::IN_PROGRESS->value);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_applications');
    }
};
