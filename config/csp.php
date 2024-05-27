<?php

return [
     /*
    * Uma policy determinará quais cabeçalhos CSP serão definidos. Uma política CSP válida é
    * qualquer classe que estenda `Spatie\Csp\Policies\Policy`
    */

     
    'policy' => App\Csp\Policies\CustomPolicy::class,

    /*
    * Esta política será colocada no modo somente relatório. Isso é ótimo para testar
    * uma nova política ou alterações na política csp existente sem quebrar nada.
    */
    'report_only_policy' => '',

    /*
    * Todas as violações contra a política serão denunciadas a este URL.
    * Um ótimo serviço que você pode usar para isso é https://report-uri.com/
    *
    * Você pode substituir essa configuração chamando `reportTo` em sua política.
    */
    'report_uri' => env('CSP_REPORT_URI', ''),

    /*
    * Os cabeçalhos só serão adicionados se esta configuração estiver definida como verdadeira.
    */
    'enabled' => env('CSP_ENABLED', true),

    /*
    * A classe responsável por gerar os nonces usados ​​nas tags e cabeçalhos inline.
    */
    'nonce_generator' => Spatie\Csp\Nonce\RandomString::class,
];
