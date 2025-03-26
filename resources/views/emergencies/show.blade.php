@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Détails de la Demande d'Urgence</h1>
        
        <span class="badge bg-{{ $emergency->emergency_level->color() }}">
            {{ strtoupper($emergency->emergency_level->value) }}
        </span>
    </div>
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Informations Patient</h5>
                    <p><strong>Nom:</strong> {{ $emergency->patient_name }}</p>
                    <p><strong>Groupe Sanguin:</strong> {{ $emergency->blood_type->value }}</p>
                    <p><strong>Quantité Requise:</strong> {{ $emergency->quantity_ml }} ml</p>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Détails de la Demande</h5>
                    <p><strong>Hôpital:</strong> {{ $emergency->hospital_details }}</p>
                    <p><strong>Demandé par:</strong> {{ $emergency->requester->name }}</p>
                    <p><strong>Date:</strong> {{ $emergency->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            
            @if($emergency->notes)
            <div class="mt-3">
                <h5>Notes:</h5>
                <p>{{ $emergency->notes }}</p>
            </div>
            @endif
            
            <div class="alert alert-{{ $availableBlood >= $emergency->quantity_ml ? 'success' : 'danger' }} mt-3">
                Stock Disponible: <strong>{{ $availableBlood }} ml</strong>
            </div>
        </div>
    </div>
    
    @if(!$emergency->isCompleted())
    <form action="{{ route('emergencies.complete', $emergency) }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success">Marquer comme Complétée</button>
    </form>
    @else
    <div class="alert alert-info">
        Cette demande a été complétée le {{ $emergency->completed_at->format('d/m/Y H:i') }}
    </div>
    @endif
    
    <a href="{{ route('emergencies.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection