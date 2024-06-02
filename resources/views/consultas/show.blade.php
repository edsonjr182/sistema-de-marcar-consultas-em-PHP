{{-- resources/views/consultas/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Detalhes da Consulta</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $consulta->paciente->nome }}</p>
            <p><strong>Médico:</strong> {{ $consulta->medico->nome }}</p>
            <p><strong>Data e Hora:</strong> {{ \Carbon\Carbon::parse($consulta->data_hora)->format('d/m/Y H:i') }}</p>
            <p><strong>Status:</strong> {{ $consulta->status }}</p>
            <p><strong>Observações:</strong> {{ $consulta->observacoes }}</p>
        </div>
    </div>
    <a href="{{ route('consultas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
