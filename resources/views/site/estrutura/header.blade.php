<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('iziToast-master/dist/css/iziToast.min.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/cookiealert.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Favicon padrão -->
    <link rel="icon" type="image/x-icon" href="https://exemplo.com/favicon.ico">
    <!-- Formato favicon recomendado -->
    <link rel="icon" type="image/png" href="https://exemplo.com/favicon.png">

        <!-- Apple Touch Icon (pelo menos 200x200px) -->
    <link rel="apple-touch-icon" href="/custom-icon.png">

    <!-- Para rodar a aplicação web em tela cheia -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Estilo da Barra de Status (veja as Meta Tags suportadas abaixo para valores disponíveis) -->
    <!-- Não tem efeito nenhum se você não tiver a meta tag anterior -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Favicons para Windows -->
    <meta name="msapplication-config" content="browserconfig.xml" />

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://exemplo.com/pagina.html">
    <meta property="og:title" content="Título do Conteúdo">
    <meta property="og:image" content="https://exemplo.com/imagem.jpg">
    <meta property="og:description" content="Descrição Aqui">
    <meta property="og:site_name" content="Nome do Site">
    <meta property="og:locale" content="pt_BR">
    <!-- As próximas tags são opcionais mas recomendadas -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">


    {{-- <!-- Open Graph / Facebook -->
    @if( Route::current()->getName() == "site.studio")
        <title>{{ $studio->nomestudio }}</title>
        <meta name="og:title" content="{{ $studio->nomestudio }}" />
        <meta name="og:description" content=" {!! Str::limit(strip_tags($studio->descricao), 180) !!}" />
        <meta property="og:image" content="{{ Voyager::image($studio->fotodestaque) }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="628" />
        <meta property="twitter:title" content="{{ $studio->nomestudio }}">
        <meta property="twitter:description" content="{!! Str::limit(strip_tags($studio->descricao), 180) !!}">
        <meta property="twitter:image" content="{{ Voyager::image($studio->fotodestaque) }}">
        <script type="application/ld+json">
            {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "{{ $studio->nomestudio }}",
            "image": [
                "{{ Voyager::image($studio->fotodestaque) }}"
            ]
            }
        </script>
    @else
        <meta property="og:image" content="https://aulasdepilates.com.br/assets-site/imgs/logo-conecta-pilates.svg" />
        <meta name="description" content="">
    @endif --}}
</head>

<body>
    {{-- cookie alert --}}
    <div id="cookie-alert" class="fixed bottom-0 left-0 w-full bg-gray-800 text-white text-center p-4">
        Este site usa cookies para garantir que você obtenha a melhor experiência.
        <button id="aceitar-cookie" class="ml-4 px-4 py-2 bg-green-500 text-white font-semibold rounded">Aceitar</button>
    </div>
