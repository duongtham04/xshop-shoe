<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('img')->nullable();
                $table->text('description')->nullable();
                $table->decimal('price', 10, 2);
                $table->unsignedInteger('view')->default(0);
                $table->unsignedInteger('sold')->default(0);
                $table->unsignedBigInteger('brand_id')->default(0);
                $table->unsignedBigInteger('category_id')->default(0);
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
