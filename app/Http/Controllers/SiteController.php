<?php

namespace App\Http\Controllers;

//Local para importar classes/Models
use App\Banner;
use App\Contato;

use App\Mail\EnviaEmailContato;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//Métodos do Site
class SiteController extends Controller
{
    public function index() {

        $banners = Banner::where('ativo', 1)->orderBy('created_at', 'DESC')->get();

        // $servicos = Servicos::where('ativo', 1)->get();

       // $noticias = Noticia::where('ativo', 1)->where('destaque', 1)->orderBy('created_at', 'DESC')->limit(5)->get();

        return view('site.index', compact('banners'));
    }

    public function contato()
    {
        return view('site.contato');
    }

    public function empresa()
    {
        return view('site.empresa');
    }

    public function servicos()
    {
        return view('site.servicos');
    }

    public function obrigado()
    {
        return view('site.obrigado');
    }

    public function privacidade()
    {
        return view('site.obrigado');
    }

    public function gravaContato(Request $request)
    {   
        try {
            $criarContato = Contato::create($request->all());
            //Envia Email de Contato
            $subject = 'Seu Site - Contato Pelo Site';
            $emails = explode(';', setting('site.email_contato'));
            foreach ($emails as $email) {
                $enviado = Mail::to($email)->send(new EnviaEmailContato($request, $subject));
            }

            // Retorna uma resposta de sucesso
            return response()->json(['success' => true, 'mensagem' => 'Mensagem enviada com sucesso.']);

        } catch (\Exception $e) {
            // Se ocorrer um erro, retorna uma resposta de erro com a mensagem apropriada
            return response()->json(['success' => false, 'mensagem' => 'Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.']);
        }
    }

}