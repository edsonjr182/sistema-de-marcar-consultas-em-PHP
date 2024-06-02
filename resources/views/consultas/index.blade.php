{{-- resources/views/consultas/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Consultas Agendadas</h1>
    <a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">Agendar Nova Consulta</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Data e Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
            <tr>
                <td>{{ $consulta->id }}</td>
                <td>{{ $consulta->paciente->nome }}</td>
                <td>{{ $consulta->medico->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($consulta->data_hora)->format('d/m/Y H:i') }}</td>
                <td>{{ $consulta->status }}</td>
                <td>
                    <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-info">Detalhes</a>
                    <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancelar</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
