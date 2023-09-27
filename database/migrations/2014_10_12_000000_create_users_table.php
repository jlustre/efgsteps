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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('sponsor');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('role')->default('user');
            $table->tinyInteger('current_rank')->default(1);
            $table->text('city_town')->nullable();
            $table->text('state_province')->nullable();
            $table->enum('country',['ca','us'])->default('ca');
            $table->string('timezone')->default('PST');
            $table->enum('status',[0,1])->default(1);
            $table->date('last_login')->nullable();
            $table->boolean('isOnline')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};