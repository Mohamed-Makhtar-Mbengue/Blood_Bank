<?php

namespace Database\Seeders;

use App\Enums\BloodType;
use App\Enums\EmergencyLevel;
use App\Models\Donor;
use App\Models\BloodInventory;
use App\Models\EmergencyRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create donors
        Donor::factory(50)->create();
        
        // Create blood inventory
        foreach (BloodType::cases() as $bloodType) {
            BloodInventory::create([
                'blood_type' => $bloodType,
                'quantity_ml' => rand(1000, 5000),
                'expiration_date' => now()->addDays(rand(1, 30)),
            ]);
        }
        
        // Create emergency requests
        foreach (EmergencyLevel::cases() as $level) {
            EmergencyRequest::factory()
                ->count(3)
                ->create(['emergency_level' => $level]);
        }
    }
}