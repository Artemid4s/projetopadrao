<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/cookiealert.js') }}"></script>
    <link href="{{ asset('iziToast-master/dist/css/iziToast.min.css') }}" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>PROJETO PADRÃO</title>
</head>

{{-- cookie alert --}}
<div id="cookie-alert" class="fixed bottom-0 left-0 w-full bg-gray-800 text-white text-center p-4">
    Este site usa cookies para garantir que você obtenha a melhor experiência.
    <button id="aceitar-cookie" class="ml-4 px-4 py-2 bg-green-500 text-white font-semibold rounded">Aceitar</button>
</div>

<body>