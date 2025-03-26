<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('emergency_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_name');
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->integer('quantity_ml');
            $table->string('hospital_name');
            $table->text('hospital_address');
            $table->string('contact_phone');
            $table->enum('urgency_level', ['low', 'medium', 'high', 'critical']);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'fulfilled', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emergency_requests');
    }
}