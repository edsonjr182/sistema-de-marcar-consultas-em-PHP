{{-- resources/views/especialidades/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Adicionar Nova Especialidade</h1>
    <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome da Especialidade:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
