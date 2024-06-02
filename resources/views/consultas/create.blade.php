{{-- resources/views/consultas/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Agendar Nova Consulta</h1>
    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="paciente_id">Paciente:</label>
            <select class="form-control" name="paciente_id" id="paciente_id" required>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="medico_id">Médico:</label>
            <select class="form-control" name="medico_id" id="medico_id" required>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="data_hora">Data e Hora:</label>
            <input type="datetime-local" class="form-control" name="data_hora" id="data_hora" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" required>
                <option value="agendada">Agendada</option>
                <option value="realizada">Realizada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="observacoes">Observações:</label>
            <textarea class="form-control" name="observacoes" id="observacoes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
@endsection
