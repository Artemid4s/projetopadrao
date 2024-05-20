<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favicon;

class FaviconController extends Controller
{
    public function gerarBrowserConfig()
    {
        // Recuperar os nomes dos arquivos de imagem da tabela favicons
        $favicons = Favicon::all();

        // Construir o conteúdo do arquivo browserconfig.xml
        $xmlContent = '<?xml version="1.0" encoding="utf-8"?>
        <browserconfig>
            <msapplication>
                <tile>';

        foreach ($favicons as $favicon) {
            $xmlContent .= "
                <square70x70logo src='{$favicon->pequeno}'/>
                <square150x150logo src='{$favicon->medio}'/>
                <wide310x150logo src='{$favicon->largo}'/>
                <square310x310logo src='{$favicon->grande}'/>";
        }

        $xmlContent .= '
                </tile>
            </msapplication>
        </browserconfig>';

        // Salvar o conteúdo no arquivo browserconfig.xml na pasta public
        file_put_contents(public_path('browserconfig.xml'), $xmlContent);

        return response()->json(['message' => 'Arquivo browserconfig.xml gerado com sucesso.']);
    }
}
