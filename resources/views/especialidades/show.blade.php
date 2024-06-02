{{-- resources/views/especialidades/show.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Especialidade: {{ $especialidade->nome }}</h1>
    <div class="card">
        <div class="card-body">
            <p>ID: {{ $especialidade->id }}</p>
            <p>Nome: {{ $especialidade->nome }}</p>
        </div>
    </div>
    <a href="{{ route('especialidades.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
