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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string("section_name")->nullable(false);
            $table->string("section_content")->nullable(false);
            $table->unsignedBigInteger("course_id")->nullable(false);
            $table->timestamps();

            $table->foreign("course_id")->on("courses")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
