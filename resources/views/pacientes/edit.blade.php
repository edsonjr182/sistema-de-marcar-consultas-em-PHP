{{-- resources/views/pacientes/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Paciente</h1>
    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $paciente->nome }}" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $paciente->cpf }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $paciente->email }}" required>
        </div>
        <!-- Campos para nome e CPF do responsável -->
<div id="responsavelInfo" style="display: none;">
    <div class="form-group">
        <label for="responsavel_nome">Nome do Responsável:</label>
        <input type="text" class="form-control" id="responsavel_nome" name="responsavel_nome">
    </div>
    <div class="form-group">
        <label for="responsavel_cpf">CPF do Responsável:</label>
        <input type="text" class="form-control" id="responsavel_cpf" name="responsavel_cpf">
    </div>
</div>

<script>
document.getElementById('data_cadastro').addEventListener('change', function() {
    var dataCadastro = new Date(this.value);
    var hoje = new Date();
    var idade = hoje.getFullYear() - dataCadastro.getFullYear();
    var m = hoje.getMonth() - dataCadastro.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < dataCadastro.getDate())) {
        idade--;
    }
    if (idade < 18) {
        document.getElementById('responsavelInfo').style.display = 'block';
    } else {
        document.getElementById('responsavelInfo').style.display = 'none';
    }
});
</script>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
