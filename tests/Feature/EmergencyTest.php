<?php

namespace Tests\Feature;

use App\Enums\EmergencyLevel;
use App\Models\EmergencyRequest;
use Tests\TestCase;

class EmergencyTest extends TestCase
{
    public function test_emergency_creation()
    {
        $response = $this->post('/emergencies', [
            'patient_name' => 'Test Patient',
            'blood_type' => 'A+',
            'quantity_ml' => 500,
            'emergency_level' => 'high',
            'hospital_details' => 'Test Hospital'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('emergency_requests', [
            'patient_name' => 'Test Patient'
        ]);
    }
}