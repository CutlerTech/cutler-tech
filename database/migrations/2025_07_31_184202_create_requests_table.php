<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('goal');
            $table->string('email');
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->integer('employees')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->text('challenge')->nullable();
            $table->text('comments')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('requests');
    }
};