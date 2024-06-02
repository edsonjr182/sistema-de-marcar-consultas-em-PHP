{{-- resources/views/medicos/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Médico</h1>
    <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome do Médico:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $medico->nome }}" required>
        </div>
        <div class="form-group">
            <label for="crm">CRM:</label>
            <input type="text" class="form-control" id="crm" name="crm" value="{{ $medico->crm }}" required>
        </div>
        <div class="form-group">
            <label for="especialidade_id">Especialidade:</label>
            <select class="form-control" id="especialidade_id" name="especialidade_id">
                @foreach ($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}" {{ $medico->especialidade_id == $especialidade->id ? 'selected' : '' }}>
                        {{ $especialidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
