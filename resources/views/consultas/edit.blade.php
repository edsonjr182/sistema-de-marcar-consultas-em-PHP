{{-- resources/views/consultas/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Consulta</h1>
    <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="paciente_id">Paciente:</label>
            <select class="form-control" name="paciente_id" id="paciente_id" required>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $consulta->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="medico_id">Médico:</label>
            <select class="form-control" name="medico_id" id="medico_id" required>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $consulta->medico_id == $medico->id ? 'selected' : '' }}>{{ $medico->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="data_hora">Data e Hora:</label>
            <input type="datetime-local" class="form-control" name="data_hora" id="data_hora" value="{{ \Carbon\Carbon::parse($consulta->data_hora)->format('d/m/Y H:i') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" required>
                <option value="agendada" {{ $consulta->status == 'agendada' ? 'selected' : '' }}>Agendada</option>
                <option value="realizada" {{ $consulta->status == 'realizada' ? 'selected' : '' }}>Realizada</option>
                <option value="cancelada" {{ $consulta->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="observacoes">Observações:</label>
            <textarea class="form-control" name="observacoes" id="observacoes">{{ $consulta->observacoes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
