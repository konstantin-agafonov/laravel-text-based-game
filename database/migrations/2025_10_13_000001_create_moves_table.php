<?php

use App\Modules\Play\Models\GameRun;
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
        Schema::create('moves', function (Blueprint $table) {
            $table->id()->comment('Move ID');
            $table
                ->foreignIdFor(GameRun::class)
                ->constrained(GameRun::getTableName())
            ;
            $table->text('scene')->comment('Scene before move');
            $table->string('move')->comment('Move player input');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moves');
    }
};


