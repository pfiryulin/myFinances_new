<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Types;
use App\Models\User;
use App\Models\Categoryes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Categoryes::class)->constrained();
            $table->foreignIdFor(Types::class)->constrained()->onUpdate('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->float('summ');
            $table->text('comment')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
