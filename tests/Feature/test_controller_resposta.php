<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Controllers\SiteController;
use App\Banner;
use App\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteControllerTest extends TestCase
{
    /**
     * Testa se o método index() retorna a view 'site.index' com os banners.
     *
     * @return void
     */
    public function test_index_method_returns_site_index_view_with_banners()
    {
        // Mock do modelo Banner para simular o retorno de banners
        $mockedBanners = [
            new Banner(),
            new Banner(),
            // Adicione mais banners simulados conforme necessário
        ];
        $mockBanner = $this->getMockBuilder(Banner::class)
                          ->disableOriginalConstructor()
                          ->getMock();
        $mockBanner->method('where')->willReturnSelf();
        $mockBanner->method('orderBy')->willReturnSelf();
        $mockBanner->method('get')->willReturn($mockedBanners);

        // Instancia o controlador e passa o mock do modelo Banner como dependência
        $controller = new SiteController($mockBanner);

        // Chama o método index()
        $response = $controller->index();

        // Verifica se o método retorna a view 'site.index'
        $this->assertEquals('site.index', $response->name());

        // Verifica se os banners estão sendo passados ​​para a view
        $this->assertArrayHasKey('banners', $response->getData());
        $this->assertEquals($mockedBanners, $response->getData()['banners']);
    }

    /**
     * Testa se o método contato() retorna a view 'site.contato'.
     *
     * @return void
     */
    public function test_contato_method_returns_site_contato_view()
    {
        // Instancia o controlador
        $controller = new SiteController();

        // Chama o método contato()
        $response = $controller->contato();

        // Verifica se o método retorna a view 'site.contato'
        $this->assertEquals('site.contato', $response->name());
    }

    /**
     * Testa se o método empresa() retorna a view 'site.empresa'.
     *
     * @return void
     */
    public function test_empresa_method_returns_site_empresa_view()
    {
        // Instancia o controlador
        $controller = new SiteController();

        // Chama o método empresa()
        $response = $controller->empresa();

        // Verifica se o método retorna a view 'site.empresa'
        $this->assertEquals('site.empresa', $response->name());
    }

    /**
     * Testa se o método servicos() retorna a view 'site.servicos'.
     *
     * @return void
     */
    public function test_servicos_method_returns_site_servicos_view()
    {
        // Instancia o controlador
        $controller = new SiteController();

        // Chama o método servicos()
        $response = $controller->servicos();

        // Verifica se o método retorna a view 'site.servicos'
        $this->assertEquals('site.servicos', $response->name());
    }

    /**
     * Testa se o método obrigado() retorna a view 'site.obrigado'.
     *
     * @return void
     */
    public function test_obrigado_method_returns_site_obrigado_view()
    {
        // Instancia o controlador
        $controller = new SiteController();

        // Chama o método obrigado()
        $response = $controller->obrigado();

        // Verifica se o método retorna a view 'site.obrigado'
        $this->assertEquals('site.obrigado', $response->name());
    }

    /**
     * Testa se o método privacidade() retorna a view 'site.obrigado'.
     *
     * @return void
     */
    public function test_privacidade_method_returns_site_privacidade_view()
    {
        // Instancia o controlador
        $controller = new SiteController();

        // Chama o método privacidade()
        $response = $controller->privacidade();

        // Verifica se o método retorna a view 'site.obrigado'
        $this->assertEquals('site.privacidade', $response->name());
    }

    /**
     * Testa se o método gravaContato() retorna uma resposta JSON correta.
     *
     * @return void
     */
    public function test_gravaContato_method_returns_correct_json_response()
    {
        // Cria uma instância de Request simulando os dados de entrada
        $request = new Request([
            'nome' => 'João',
            'email' => 'joao@example.com',
            'mensagem' => 'Olá, este é um teste de mensagem.'
        ]);

        // Mock do modelo Contato para simular a criação de um contato
        $mockedContato = new Contato();
        $mockContato = $this->getMockBuilder(Contato::class)
                            ->disableOriginalConstructor()
                            ->getMock();
        $mockContato->method('create')->willReturn($mockedContato);

        // Mock de Mail para simular o envio de e-mail
        Mail::fake();

        // Instancia o controlador e passa o mock do modelo Contato como dependência
        $controller = new SiteController($mockContato);

        // Chama o método gravaContato()
        $response = $controller->gravaContato($request);

        // Verifica se a resposta JSON está correta
        $this->assertTrue($response->getData()->success);
        $this->assertEquals('Mensagem enviada com sucesso.', $response->getData()->mensagem);
    }
}
