{{-- resources/views/especialidades/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Especialidade</h1>
    <form action="{{ route('especialidades.update', $especialidade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome da Especialidade:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $especialidade->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
