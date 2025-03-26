<?php

namespace App\Models;

use App\Enums\BloodType;
use App\Enums\EmergencyLevel;
use Illuminate\Database\Eloquent\Model;

class EmergencyRequest extends Model
{
    protected $fillable = [
        'patient_name', 'blood_type', 'quantity_ml',
        'emergency_level', 'hospital_details', 'notes',
        'requested_by', 'completed_at'
    ];

    protected $casts = [
        'blood_type' => BloodType::class,
        'emergency_level' => EmergencyLevel::class,
        'completed_at' => 'datetime',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function isCompleted(): bool
    {
        return $this->completed_at !== null;
    }

    public function markAsCompleted()
    {
        $this->update(['completed_at' => now()]);
    }
}