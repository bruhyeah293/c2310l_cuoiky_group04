<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // ✔ Cho phép null – chỉ set khi review từ users
            $table->unsignedBigInteger('user_id')->nullable();

            // ✔ Cho phép null – chỉ set khi review từ members
            $table->unsignedBigInteger('member_id')->nullable();

            $table->unsignedBigInteger('product_id');

            $table->text('content');
            $table->timestamps();

            // Khóa ngoại (nullable vẫn OK)
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('member_id')
                  ->references('id')->on('members')
                  ->onDelete('cascade');


            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
}
