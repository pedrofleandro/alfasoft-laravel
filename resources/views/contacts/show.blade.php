<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Contato</title>
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

        .success-message {
            background-color: #e7f7e7;
            border: 1px solid #4CAF50;
            padding: 10px;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        .contact-details {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            font-size: 16px;
        }

        .contact-details p {
            margin: 10px 0;
            font-size: 18px;
        }

        .contact-details strong {
            color: #4CAF50;
        }

        button, a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 10px;
        }

        button:hover, a:hover {
            background-color: #45a049;
        }

        form button {
            background-color: #f44336;
        }

        form button:hover {
            background-color: #e53935;
        }

        .back-button {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            display: inline-block;
            margin-top: 20px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <h1>Detalhes do Contato</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="contact-details">
        <p><strong>Nome:</strong> {{ $contact->name }}</p>
        <p><strong>Contato:</strong> {{ $contact->contact }}</p>
        <p><strong>E-mail:</strong> {{ $contact->email }}</p>
    </div>

    <a href="{{ route('contacts.edit', $contact->id) }}">Editar</a>

    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</button>
    </form>

    <a href="/" class="back-button">Voltar para a Listagem</a>

</body>
</html>
