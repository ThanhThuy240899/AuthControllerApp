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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id(); // Primary key, tự động tăng
            $table->string('email')->unique(); // Email độc nhất
            $table->string('password'); // Mật khẩu
            $table->string('full_name'); // Tên đầy đủ
            $table->date('birth_date'); // Ngày sinh
            $table->string('phone')->nullable(); // Số điện thoại, có thể null
            $table->string('avatar')->nullable(); // Đường dẫn ảnh đại diện, có thể null
            $table->string('school')->nullable(); // Trường học, có thể null
            $table->string('skill')->nullable(); // Kỹ năng, có thể null
            $table->string('level')->nullable(); // Cấp độ, có thể null
            $table->string('address')->nullable(); // Địa chỉ, có thể null
            $table->text('bio')->nullable(); // Tiểu sử, có thể null
            $table->text('interests')->nullable(); // Sở thích, có thể null
            $table->text('experience')->nullable(); // Kinh nghiệm, có thể null
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
