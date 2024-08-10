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
        Schema::create('patients', function (Blueprint $table) {
            
            $table->id();                                   // Global Id For All Patients
            $table->unsignedBigInteger('doctor_id');          // who is created
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('national_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('birth_date')->nullable();
            $table->date('join_date')->nullable();
            $table->enum('gender',['','male','female'])->default('');
            $table->unsignedBigInteger('created_id')->nullable();
            $table->unsignedBigInteger('edit_by')->nullable();          //last edit by      
            $table->timestamps();            
        });

        Schema::create('patient_codes', function (Blueprint $table) {
            
            $table->unsignedBigInteger('patient_id');                       // Code of patient
            $table->unsignedBigInteger('doctor_id');                        // Doctor Related To                
            $table->unsignedBigInteger('code');                             // Auto Increment depend on doctor
            $table->unsignedBigInteger('created_by')->nullable();           // Created  By
            $table->unsignedBigInteger('modified_by')->nullable();          // Modified By
            $table->timestamps();
            $table->unique(['code','doctor_id']);
            
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
