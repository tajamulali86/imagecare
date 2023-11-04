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

        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('custom_price_id');
            $table->foreignId('agent_type_id');
            $table->foreignId('agent_contact_id');
            $table->string('name');
            $table->text('address');
            $table->string('email');
            $table->string('number');
            $table->string('position');
            $table->string('company_name');
            $table->foreignId('company_type_id')->constrained();
            $table->string('rto_provider_no')->nullable();
            $table->string('cricos_no')->nullable();
            $table->string('company_abn');
            $table->text('company_address');
            $table->string('company_number')->nullable();
            $table->string('company_landline')->nullable();
            $table->string('company_fax')->nullable();
            $table->text('comment')->nullable();
            $table->string('special_price')->nullable();

            $table->date('added_date');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_types');
        Schema::dropIfExists('agents');
    }
};
