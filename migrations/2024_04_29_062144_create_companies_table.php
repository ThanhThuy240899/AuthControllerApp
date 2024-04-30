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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('career_id')->nullable(); // Thêm cột career_id là unsignedBigInteger
            $table->string('name'); // Thêm cột name
            $table->string('email')->unique(); // Thêm cột email với thuộc tính unique
            $table->string('password'); // Thêm cột password
            $table->string('address')->nullable(); // Thêm cột address có thể null
            $table->timestamps();

            // Khai báo khóa ngoại liên kết career_id với bảng careers
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
