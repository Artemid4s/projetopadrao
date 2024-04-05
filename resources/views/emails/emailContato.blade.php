<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        .details {
            margin-top: 20px;
        }
        .details p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contato</h2>
        <div class="details">
            <p><strong>Nome:</strong> {{ $mensagem['nome'] }}</p>
            <p><strong>Email:</strong> {{ $mensagem['email'] }}</p>
            <p><strong>Telefone:</strong> {{ $mensagem['telefone'] }}</p>
            <p><strong>Cidade:</strong> {{ $mensagem['cidade'] }}</p>
            <p><strong>Mensagem:</strong> {{ $mensagem['mensagem'] }}</p>
        </div>
    </div>
</body>
</html>
