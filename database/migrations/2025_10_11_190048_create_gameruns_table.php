<?php

use App\Models\User;
use App\Modules\Play\Models\Game;
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
        Schema::create('gameruns', function (Blueprint $table) {
            $table->id()->comment('Game run ID');
            $table->tinyInteger('status')->comment('Game run status');
            $table
                ->foreignIdFor(Game::class)
                ->constrained(Game::getTableName())
            ;
            $table
                ->foreignIdFor(User::class)
                ->constrained(User::getTableName())
            ;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gameruns');
    }
};
