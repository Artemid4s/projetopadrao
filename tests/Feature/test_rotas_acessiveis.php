<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class test_rotas_acessiveis extends TestCase
{
    /**
     * Testa se as rotas estão acessíveis.
     *
     * @return void
     */
    public function testExample()
    {
        // Exemplo: Verifica se a rota raiz "/" retorna código de status 200
        $response = $this->get('/');

        $response->assertStatus(200);

        // Adicione mais verificações para outras rotas conforme necessário
    }
}
