{{-- resources/views/medicos/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Médicos</h1>
    <a href="{{ route('medicos.create') }}" class="btn btn-primary">Adicionar Médico</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
            <tr>
                <td>{{ $medico->id }}</td>
                <td>{{ $medico->nome }}</td>
                <td>{{ $medico->crm }}</td>
                <td>{{ $medico->especialidade->nome }}</td>
                <td>
                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-secondary">Editar</a>
                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display: inline-block;">
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
