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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("course_name")->nullable(false);
            $table->string("course_description")->nullable();
            $table->integer("course_price");
            $table->unsignedBigInteger("status_id")->nullable(false);
            $table->timestamps();

            $table->foreign("status_id")->on("statuses")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
