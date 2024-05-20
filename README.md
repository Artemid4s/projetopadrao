## Projeto Padrão: README
O objetivo deste projeto é fornecer uma estrutura sólida para servir de base a outros projetos, mantendo-se atualizado conforme as demandas comuns solicitadas.

## Instalação
Clone o repositório:
git clone https://github.com/Artemid4s/projetopadrao.git
Instale as dependências do Composer:
cd projetopadrao/laradock-workspace
composer install
composer update
Configure o arquivo .env com os dados de conexão do seu banco de dados e crie o banco de dados correspondente.

Adicione a entrada no arquivo de hosts do seu computador:

127.0.0.1 projetopadrao.local
Crie o arquivo de configuração do seu site em laradock/nginx/sites:
Nome do arquivo: projetopadrao.conf
Conteúdo do arquivo:
server {
    listen 80;
    listen [::]:80;

    server_name projetopadrao.local;
    root /var/www/projetopadrao/public;
    index index.php index.html index.htm;

    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_pass php-upstream;
        fastcgi_index index.php;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fixes timeouts
        fastcgi_read_timeout 600;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt/;
        log_not_found off;
    }

    error_log /var/log/nginx/laravel_error.log;
    access_log /var/log/nginx/laravel_access.log;
}

## Uso
Este projeto serve como base para projetos futuros. Lembre-se de personalizar o nome do banco de dados, etc. Ele inclui configurações pré-definidas, como envio de formulários, envio de e-mails e listagem de objetos. Também estão instalados o Tailwind CSS e o IziToast para notificações elegantes.

Também tem alguns testes básicos que incluem as views padrões do projeto, testa os métodos padrões e a conexão com o banco.

Criado local pra que fique mais fácil inserir as keys do recaptcha, também criei um método que deve ser responsável por válidar o recaptcha de todos os forms.

Doc complementar de boas práticas: https://github.com/jcezarms/Front-End-Checklist?tab=readme-ov-file

É um modelo sólido para iniciar novos projetos. Bom trabalho!

## Exemplos
Aqui estão alguns exemplos de uso:

Listagem de Banners:

Os banners são cadastrados pelo admin na aba lateral "Banners". A listagem dos banners ativos, ordenados pelo mais recente, pode ser encontrada em App/SiteController no método index.
Listagem de Clientes:

Suponha que você tenha criado a tabela "Clientes" com os campos id, nome, created_at e updated_at. Se a model App\Clientes não existir, crie-a. No SiteController, importe a model e crie um método para recuperar os clientes:
use App\Clientes;

public function clientes()
{
    $clientes = Clientes::all();
    return view('site.clientes', compact('clientes'));
}
Na sua view, você pode exibir os valores assim:
@foreach($clientes as $cliente)
    <p>{{ $cliente->nome }}</p>
@endforeach