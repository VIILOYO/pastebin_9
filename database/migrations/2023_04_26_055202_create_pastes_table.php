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
        Schema::create('pastes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->string('title', 255)->default('undefined');
            $table->string('url')->unique(true);
            $table->text('text');
            $table->bigInteger('expiration_time')->nullable(true);
            $table->unsignedSmallInteger('access_restriction')->default(1);
            $table->string('language');
            $table->dateTime('timeToDelete')->nullable(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pastes');
    }
};
