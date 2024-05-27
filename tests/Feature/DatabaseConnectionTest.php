<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseConnectionTest extends TestCase
{
    use RefreshDatabase; // Use o trait RefreshDatabase para garantir que o banco de dados seja redefinido antes de cada teste

    /**
     * Testa a conexão com o banco de dados.
     *
     * @return void
     */
    public function test_database_connection()
    {
        try {
            // Tenta se conectar ao banco de dados
            DB::connection()->getPdo();

            // Se a conexão for bem-sucedida, o teste passa
            $this->assertTrue(true);
        } catch (\Exception $e) {
            // Se ocorrer um erro ao se conectar ao banco de dados, o teste falha
            $this->fail('Erro ao conectar ao banco de dados: ' . $e->getMessage());
        }
    }

    /**
     * Testa uma consulta de exemplo ao banco de dados.
     *
     * @return void
     */
    public function test_database_query()
    {
        // Execute uma consulta de exemplo
        $result = DB::table('users')->count();

        // Verifique se o resultado da consulta é um número inteiro positivo
        $this->assertIsInt($result);
        $this->assertGreaterThanOrEqual(0, $result);
    }
}
