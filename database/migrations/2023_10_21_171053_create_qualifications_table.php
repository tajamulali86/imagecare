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


        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId("qualification_level_id");
            $table->string('title');
            $table->foreignId("qualification_category_id");
            $table->enum('status',['Current','Superseeded']);
            $table->foreignId("prerequisite_id");
            $table->boolean('show_on_list')->default(true);
            $table->text('comment')->nullable();
            $table->timestamps();

        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
