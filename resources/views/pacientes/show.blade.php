{{-- resources/views/pacientes/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Paciente: {{ $paciente->nome }}</h1>
    <div class="card">
        <div class="card-body">
            <p>ID: {{ $paciente->id }}</p>
            <p>Nome: {{ $paciente->nome }}</p>
            <p>CPF: {{ $paciente->cpf }}</p>
            <p>Email: {{ $paciente->email }}</p>
        </div>
    </div>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
