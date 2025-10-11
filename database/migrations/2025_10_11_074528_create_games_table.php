<?php

use App\Models\User;
use App\Modules\Category\Models\Category;
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
        Schema::create('games', function (Blueprint $table) {
            $table->id()->comment('Game ID');
            $table->string('name')->index()->comment('Game name');
            $table->text('description')->nullable()->comment('Game description');
            $table
                ->foreignIdFor(User::class)
                ->constrained(User::getTableName())
            ;
            $table->foreignIdFor(Category::class);
            $table->json('scenario')->nullable()->comment('Game scenario data');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
