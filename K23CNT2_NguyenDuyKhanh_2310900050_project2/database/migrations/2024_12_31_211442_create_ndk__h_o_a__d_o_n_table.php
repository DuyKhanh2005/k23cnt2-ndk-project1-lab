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
        Schema::create('ndk_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->string('ndkMaHoaDon', 255)->unique();
            
            // Định nghĩa khóa ngoại cho ndkMaKhachHang
            $table->bigInteger('ndkMaKhachHang')->unsigned();
            $table->foreign('ndkMaKhachHang')
                  ->references('id')->on('ndk_KHACH_HANG')
                  ->onDelete('cascade');  // Xóa hóa đơn khi khách hàng bị xóa
            
            $table->date('ndkNgayHoaDon');
            $table->date('ndkNgayNhan');
            $table->string('ndkHoTenKhachHang', 255);
            $table->string('ndkEmail', 255);
            $table->string('ndkDienThoai', 255);
            $table->string('ndkDiaChi', 255);
            $table->float('ndkTongGiaTri');
            $table->tinyInteger('ndkTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ndk_HOA_DON');
    }
};