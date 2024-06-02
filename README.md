
# Sistema de Gerenciamento de Consultas Médicas

Este projeto é um sistema de gerenciamento de consultas médicas desenvolvido utilizando o framework Laravel. Ele permite o gerenciamento de pacientes, médicos, especialidades médicas e consultas.

## Características

- **Cadastro de Pacientes**: Gerencie informações dos pacientes incluindo nome, CPF, endereço e informações de contato.
- **Cadastro de Médicos**: Inclui funcionalidades para cadastrar médicos, associando-os a suas respectivas especialidades.
- **Gestão de Especialidades Médicas**: Permite adicionar, modificar e excluir especialidades.
- **Agendamento de Consultas**: Interface para agendar consultas médicas, associando pacientes e médicos, com a opção de adicionar observações sobre cada consulta.
- **Relatórios de Consultas**: Visualize as consultas agendadas, filtrando por data, médico ou paciente.

## Tecnologias Utilizadas

- **Backend**: Laravel
- **Database**: MySQL
- **Frontend**: Bootstrap para as interfaces

## Pré-requisitos

Antes de iniciar, certifique-se de ter o seguinte software instalado:
- PHP >= 7.3
- Composer
- MySQL ou MariaDB
- Node.js e NPM (opcional para compilar assets frontend)

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. Instale as dependências do Composer:
   ```bash
   composer install
   ```

3. Crie um banco de dados MySQL:
   - Faça login no seu sistema de gerenciamento de banco de dados MySQL (por exemplo, via phpMyAdmin ou linha de comando):
     ```bash
     mysql -u root -p
     ```
   - Crie o banco de dados:
     ```sql
     CREATE DATABASE nome_do_banco_de_dados;
     ```
   - Saia do MySQL:
     ```sql
     EXIT;
     ```

4. Configure o ambiente:
   - Copie o arquivo `.env.example` para `.env`:
     ```bash
     cp .env.example .env
     ```
   - Abra o arquivo `.env` com um editor de texto e ajuste as configurações de conexão ao banco de dados:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nome_do_banco_de_dados
     DB_USERNAME=seu_usuario
     DB_PASSWORD=sua_senha
     ```
   - Gere a chave da aplicação:
     ```bash
     php artisan key:generate
     ```

5. Execute as migrations para criar as tabelas no banco de dados:
   ```bash
   php artisan migrate
   ```

6. (Opcional) Se desejar compilar os assets do frontend:
   ```bash
   npm install
   npm run dev
   ```

7. Inicie o servidor:
   ```bash
   php artisan serve
   ```
   Agora, acesse o sistema em `http://localhost:8000`.

## Criação do Usuário Admin

Para criar um usuário admin para acessar o sistema pela primeira vez:

1. Acesse o Tinker para interagir com o banco de dados via Laravel:
   ```bash
   php artisan tinker
   ```

2. Execute o seguinte comando para criar um novo usuário:
   ```php
   $user = new \App\Models\User;
   $user->name = 'Admin';
   $user->email = 'admin@example.com';
   $user->password = Hash::make('password');
   $user->save();
   ```

   Substitua `'admin@example.com'` e `'password'` com o email e senha que você deseja usar para o admin.

## Uso

Para começar a usar o sistema, logue-se usando as credenciais do usuário admin que você criou. Uma vez logado, você pode começar a cadastrar médicos, pacientes e agendar consultas através das interfaces fornecidas no sistema.

## Contribuição

Contribuições são sempre bem-vindas! Se você tem sugestões para melhorar o sistema, por favor, abra um issue ou envie um pull request com suas melhorias.

## Licença



Este projeto está licenciado sob a Licença MIT - veja o arquivo `LICENSE` para detalhes.

## Contato

Se precisar de ajuda, sinta-se à vontade para entrar em contato pelo eferreiradepaulajunior@gmail.com.

---
Boa sorte e obrigado por usar ou contribuir para este projeto!
```
