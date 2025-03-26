<?php

namespace App\Http\Controllers;

use App\Models\EmergencyRequest;
use App\Models\BloodInventory;
use App\Http\Requests\StoreEmergencyRequest;
use App\Enums\EmergencyLevel;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergencies = EmergencyRequest::with('requester')
            ->orderBy('emergency_level', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('emergencies.index', compact('emergencies'));
    }

    public function create()
    {
        $emergencyLevels = EmergencyLevel::cases();
        return view('emergencies.create', compact('emergencyLevels'));
    }

    public function store(StoreEmergencyRequest $request)
    {
        $validated = $request->validated();
        
        $emergency = EmergencyRequest::create([
            'patient_name' => $validated['patient_name'],
            'blood_type' => $validated['blood_type'],
            'quantity_ml' => $validated['quantity_ml'],
            'emergency_level' => $validated['emergency_level'],
            'hospital_details' => $validated['hospital_details'],
            'notes' => $validated['notes'] ?? null,
            'requested_by' => auth()->id(),
        ]);
        
        // Check inventory and notify if low stock
        $this->checkInventory($validated['blood_type'], $validated['quantity_ml']);
        
        return redirect()->route('emergencies.show', $emergency)
            ->with('success', 'Demande d\'urgence enregistrée avec succès!');
    }

    public function show(EmergencyRequest $emergency)
    {
        $availableBlood = BloodInventory::where('blood_type', $emergency->blood_type)
            ->where('expiration_date', '>', now())
            ->sum('quantity_ml');
            
        return view('emergencies.show', compact('emergency', 'availableBlood'));
    }

    public function complete(EmergencyRequest $emergency)
    {
        $emergency->markAsCompleted();
        
        // Deduct from inventory logic here
        
        return redirect()->back()
            ->with('success', 'Demande d\'urgence marquée comme complétée!');
    }

    private function checkInventory(string $bloodType, int $quantityNeeded)
    {
        $available = BloodInventory::where('blood_type', $bloodType)
            ->where('expiration_date', '>', now())
            ->sum('quantity_ml');
            
        if ($available < $quantityNeeded) {
            // Notify staff about low inventory
            // Implementation depends on your notification system
        }
    }
}