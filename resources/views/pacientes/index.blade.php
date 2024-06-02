{{-- resources/views/pacientes/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Pacientes</h1>
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Adicionar Paciente</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nome }}</td>
                <td>{{ $paciente->cpf }}</td>
                <td>{{ $paciente->email }}</td>
                <td>
                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info">Detalhes</a>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-secondary">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline-block;">
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
