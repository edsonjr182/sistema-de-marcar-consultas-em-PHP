{{-- resources/views/medicos/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Adicionar Novo Médico</h1>
    <form action="{{ route('medicos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do Médico:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="crm">CRM:</label>
            <input type="text" class="form-control" id="crm" name="crm" required>
        </div>
        <div class="form-group">
            <label for="especialidade_id">Especialidade:</label>
            <select class="form-control" id="especialidade_id" name="especialidade_id">
                @foreach ($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
