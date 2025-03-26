@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Nouvelle Demande d'Urgence</h1>
    
    <form action="{{ route('emergencies.store') }}" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="patient_name" class="form-label">Nom du Patient</label>
                    <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                </div>
                
                <div class="mb-3">
                    <label for="blood_type" class="form-label">Groupe Sanguin</label>
                    <select class="form-select" id="blood_type" name="blood_type" required>
                        @foreach(App\Enums\BloodType::cases() as $bloodType)
                            <option value="{{ $bloodType->value }}">{{ $bloodType->value }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="quantity_ml" class="form-label">Quantité Nécessaire (ml)</label>
                    <input type="number" class="form-control" id="quantity_ml" name="quantity_ml" min="100" required>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="emergency_level" class="form-label">Niveau d'Urgence</label>
                    <select class="form-select" id="emergency_level" name="emergency_level" required>
                        @foreach(App\Enums\EmergencyLevel::cases() as $level)
                            <option value="{{ $level->value }}">{{ ucfirst($level->value) }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="hospital_details" class="form-label">Détails de l'Hôpital</label>
                    <textarea class="form-control" id="hospital_details" name="hospital_details" rows="3" required></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes Additionnelles</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Soumettre la Demande</button>
    </form>
</div>
@endsection