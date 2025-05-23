<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Types;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categoryes', function (Blueprint $table) {
            $table->id();
            $table->string('category_name', 255);
            $table->foreignIdFor(Types::class)->constrained()->onUpdate('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoryes');
    }
};
