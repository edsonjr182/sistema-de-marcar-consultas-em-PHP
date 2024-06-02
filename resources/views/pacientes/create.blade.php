{{-- resources/views/pacientes/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Adicionar Novo Paciente</h1>
    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="numero">Numero:</label>
            <input type="number" class="form-control" name="numero" id="numero" required>

        </div>
        <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="data_cadastro">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" required>
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

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@endsection

@section('scripts')



@endsection


