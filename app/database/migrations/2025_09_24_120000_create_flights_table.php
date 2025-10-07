<?php

use App\Modules\Region\Models\Region;
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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('sid')->nullable();
            $table->string('reg')->nullable();
            $table->string('dep')->nullable();
            $table->string('dest')->nullable();
            $table->string('eet')->nullable();
            $table->text('zona')->nullable();
            $table->string('typ')->nullable();
            $table->string('folder')->nullable();
            $table->date('dof')->nullable();
            $table->time('dep_time')->nullable();
            $table->time('arr_time')->nullable();
            $table->foreignIdFor(Region::class);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
