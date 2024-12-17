<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        .add-contact-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto 20px auto;
            text-decoration: none;
            text-align: center;
            width: 200px;
        }

        .add-contact-btn:hover {
            background-color: #45a049;
            color: white;
        }

        .success-message {
            background-color: #e7f7e7;
            border: 1px solid #4CAF50;
            padding: 10px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #45a049;
        }

        button {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #d32f2f;
        }

        button:focus {
            outline: none;
        }

        .clickable-row {
            cursor: pointer;
        }

        .clickable-row:hover {
            background-color: #f0f8ff; 
        }
    </style>
</head>
<body>
    <h1>Lista de Contatos</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão para ir para a página de cadastro -->
    <a href="{{ route('contacts.create') }}" class="add-contact-btn">Adicionar Novo Contato</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr class="clickable-row" onclick="window.location='{{ route('contacts.show', $contact->id) }}';">
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->contact }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    <a href="{{ route('contacts.edit', $contact->id) }}">Editar</a> | 
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
