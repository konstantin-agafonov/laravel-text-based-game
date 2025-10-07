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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index()->unique();
            $table->string('name_alt')->nullable();
            $table->string('okato')->nullable();
            $table->string('oktmo')->nullable();
            $table->boolean('is_dual_name')->nullable();
            $table->boolean('is_capital')->nullable();
            $table->string('zip')->nullable();
            $table->string('population')->nullable();
            $table->string('year_founded')->nullable();
            $table->string('name_en')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
