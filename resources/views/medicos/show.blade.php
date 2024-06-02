{{-- resources/views/medicos/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Médico: {{ $medico->nome }}</h1>
    <div class="card">
        <div class="card-body">
            <p>ID: {{ $medico->id }}</p>
            <p>Nome: {{ $medico->nome }}</p>
            <p>CRM: {{ $medico->crm }}</p>
            <p>Especialidade: {{ $medico->especialidade->nome }}</p>
        </div>
    </div>
    <a href="{{ route('medicos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
