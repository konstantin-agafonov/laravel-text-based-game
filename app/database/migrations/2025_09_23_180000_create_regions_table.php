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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index()->unique();
            $table->string('type')->nullable();
            $table->string('type_short')->nullable();
            $table->string('okato')->nullable();
            $table->string('oktmo')->nullable();
            $table->string('code');
            $table->string('iso_3166-2')->nullable();
            $table->string('population')->nullable();
            $table->string('year_founded')->nullable();
            $table->string('fullname')->nullable();
            $table->string('name_en')->nullable();
            $table->string('district')->nullable();
            $table->integer('capital_city_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
