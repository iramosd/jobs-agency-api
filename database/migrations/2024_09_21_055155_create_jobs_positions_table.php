<?php

use App\Enum\JobTypeEnum;
use App\Enum\JobModalityEnum;
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
        Schema::create('jobs_positions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('modality')->default(JobModalityEnum::ONSITE->value);
            $table->string('location')->nullable();
            $table->string('type')->default(JobTypeEnum::FULL_TIME->value);
            $table->float('min_salary', 2)->nullable();
            $table->float('max_salary', 2)->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_positions');
    }
};
