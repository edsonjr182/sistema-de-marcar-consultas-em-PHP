@extends('layouts.admin')

@section('header')
    <h2>Especialidades Médicas</h2>
@endsection

@section('content')
<div class="container">
    <h1>Especialidades Médicas</h1>
    <a href="{{ route('especialidades.create') }}" class="btn btn-primary">Adicionar Especialidade</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($especialidades as $especialidade)
            <tr>
                <td>{{ $especialidade->id }}</td>
                <td>{{ $especialidade->nome }}</td>
                <td>
                    <a href="{{ route('especialidades.edit', $especialidade->id) }}" class="btn btn-secondary">Editar</a>
                    <form action="{{ route('especialidades.destroy', $especialidade->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

