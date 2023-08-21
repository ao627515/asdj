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
        Schema::create('prbs_candidates', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('funding_difficulties');
            $table->increments('candidate_id');
            $table->string('last_name');
            $table->string('first_names');
            $table->string('gender');
            $table->string('birthplace');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('id_document_number');
            $table->date('id_document_date');
            $table->string('residence_city');
            $table->string('residence_district');
            $table->string('phone');
            $table->string('email');
            $table->string('status');
            $table->timestamp('inscription_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prbs_candidates');
    }
};
