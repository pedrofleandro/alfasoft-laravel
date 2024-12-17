<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Contato</title>
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

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        .back-button {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
            margin-top: 15px;
            text-align: center;
            width: 100%;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <h1>Adicionar Novo Contato</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="contact">Contato (9 dígitos):</label>
        <input type="text" name="contact" id="contact" value="{{ old('contact') }}" required>
        @error('contact')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit">Adicionar Contato</button>
    </form>

    <a href="/">
        <button class="back-button">Voltar para a Listagem</button>
    </a>

</body>
</html>
