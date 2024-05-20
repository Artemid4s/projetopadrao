<?php
namespace App\Http\Controllers;

class SitemapXmlController extends Controller
{
    public function index() {
        return response()->view('index')->header('Content-Type', 'text/xml');
      }
}


//Dev pra que serve isso?
// Um Sitemap XML é um arquivo que você coloca no seu site para informar aos mecanismos de busca (como Google, Bing, etc.) 
// sobre todas as páginas do seu site que eles devem rastrear e indexar.
// Ele é especialmente útil para sites grandes, com muitas páginas ou páginas que não estão bem conectadas entre si.

//Pra que usar isso dev????

// Melhora a Indexação: Ajuda os mecanismos de busca a encontrar todas as páginas importantes do seu site, especialmente as que podem não ser descobertas através de links internos.
// Atualizações Rápidas: Permite que os mecanismos de busca saibam sobre novas páginas ou mudanças em páginas existentes rapidamente.
// Controle: Dá a você mais controle sobre quais páginas deseja que sejam indexadas.