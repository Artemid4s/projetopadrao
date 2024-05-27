<?php

namespace App\Http\Controllers;

//Local para importar classes/Models
use App\Banner;
use App\Contato;

use App\Mail\EnviaEmailContato;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Util\Util;

//Métodos do Site
class SiteController extends Controller
{
    public function index()
    {
        $banners = Banner::where('ativo', 1)->orderBy('created_at', 'DESC')->get();

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
            // Verifica o reCAPTCHA antes de criar o contato
            $token = $request->input('g-recaptcha-response');
            $recaptchaValido = Util::validarRecaptcha($token);

            if (!$recaptchaValido) {
                return response()->json(['success' => false, 'mensagem' => 'Falha na validação do reCAPTCHA.']);
            }

            // Tenta criar o contato
            try {
                Contato::create($request->all());
            } catch (\Exception $e) {
                // Se ocorrer um erro ao criar o contato, retorna uma resposta de erro
                return response()->json(['success' => false, 'mensagem' => 'Ocorreu um erro ao criar o contato.']);
            }

            //Envia Email de Contato
            try {
                $this->enviarEmailContato($request);
            } catch (\Exception $e) {
                // Se ocorrer um erro ao enviar o e-mail, retorna uma resposta de erro
                return response()->json(['success' => false, 'mensagem' => 'Ocorreu um erro ao enviar o e-mail de contato.']);
            }

            // Retorna uma resposta de sucesso
            return response()->json(['success' => true, 'mensagem' => 'Mensagem enviada com sucesso.']);
        } catch (\Exception $e) {
            // Se ocorrer um erro em qualquer outra parte do processo, retorna uma resposta de erro
            return response()->json(['success' => false, 'mensagem' => 'Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.']);
        }
    }

    // Função para enviar o e-mail de contato
    private function enviarEmailContato(Request $request)
    {
        $subject = 'Seu Site - Contato Pelo Site';
        $emails = explode(';', setting('site.email_contato'));

        foreach ($emails as $email) {
            Mail::to($email)->send(new EnviaEmailContato($request, $subject));
        }
    }
}
