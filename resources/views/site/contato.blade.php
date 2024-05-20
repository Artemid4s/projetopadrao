@extends('template', ['title' => 'Contato'])

<link href="{{ asset('iziToast-master/dist/css/iziToast.min.css') }}" rel="stylesheet">
@section('conteudo-site')
    <section class="s-breadcrumbs">
        <div class="container">
            <h2>Fale conosco</h2>
            <nav>
                <ul>
                    <li><a href="#">Inicial</a></li>
                    <li><a href="#" class="active">Fale conosco</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="s-fale-conosco">
        <div class="container">
            <div class="right">
                <h1>Entre em contato conosco através do formulário abaixo</h1>
                <p>Campos marcados com <span></span> são de preenchimento obrigatório.</p>
                <form id="ajax_form" name="ajax_form" class="">
                    {{ csrf_field() }}
                    <div class="inputs-wrapper">
                        <div class="input-wrapper">
                            <label for="nome">Nome</label>
                            <input class="required" name="nome" id="nome" type="text" placeholder="Nome">
                        </div>
                        <div class="input-wrapper">
                            <label for="email">E-mail</label>
                            <input class="required" name="email" id="email" type="email" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <label for="telefone">Telefone</label>
                        <input class="required" name="telefone" id="telefone" type="tel" placeholder="Telefone">
                    </div>
                    <div class="inputs-wrapper">
                        <div class="input-wrapper">
                            <label for="cidade">Cidade</label>
                            <input class="required" name="cidade" id="cidade" type="text" placeholder="Cidade">
                        </div>
                        <div style="width: 20%;" class="input-wrapper">
                            <label for="estado">UF</label>
                            <div class="select">
                                <select aria-label="UF" name="estado" id="estado" class="required">
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS" selected>RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                    <option value="EX">EX</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" id="mensagem" class="required" name="" id="" cols="30" rows="10" placeholder="Como podemos ajudar?"></textarea>
                    </div>
                    <div class="input-wrapper-submit">
                        <input class="btn-submit" type="submit" value="Enviar"> 
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

    <script src="{{ asset('iziToast-master/dist/js/iziToast.min.js') }}"></script>

    <script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function() {
        // Aplicar a máscara de telefone
        const telefone = document.getElementById('telefone');
        Inputmask({
            mask: ['(99) 9999-9999', '(99) 99999-9999'],
            keepStatic: true
        }).mask(telefone);

        

        $('#ajax_form').submit(function(event) {
            event.preventDefault();

            const nomeInput = document.getElementById('nome');
            const emailInput = document.getElementById('email');
            const telefoneInput = document.getElementById('telefone');
            const cidadeInput = document.getElementById('cidade');
            const mensagemInput = document.getElementById('mensagem');

            const nome = nomeInput.value.trim();
            const email = emailInput.value.trim();
            const telefone = telefoneInput.value.trim();
            const cidade = cidadeInput.value.trim();
            const mensagem = mensagemInput.value.trim();

            // Expressão regular para validar e-mail
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+/;
        
            if (nome === '') {
                iziToast.error({
                    title: 'Oooops!',
                    message: 'Por favor, preencha o campo Nome.',
                    timeout: 5000,
                    position: 'topCenter',
                });
                nomeInput.focus(); // Foca no campo de nome
                return; // Sai da função para evitar enviar a requisição
            }

            if (!emailRegex.test(email)) {
                iziToast.error({
                    title: 'Oooops!',
                    message: 'Por favor, insira um E-mail válido.',
                    timeout: 5000,
                    position: 'topCenter',
                });
                emailInput.focus(); // Foca no campo de e-mail
                return; // Sai da função para evitar enviar a requisição
            }

            if (telefone === '') {
                iziToast.error({
                    title: 'Oooops!',
                    message: 'Por favor, preencha o campo Telefone.',
                    timeout: 5000,
                    position: 'topCenter',
                });
                telefoneInput.focus(); // Foca no campo de telefone
                return; // Sai da função para evitar enviar a requisição
            }

            if (cidade === '') {
                iziToast.error({
                    title: 'Oooops!',
                    message: 'Por favor, preencha o campo Cidade.',
                    timeout: 5000,
                    position: 'topCenter',
                });
                cidadeInput.focus(); // Foca no campo de cidade
                return; // Sai da função para evitar enviar a requisição
            }

            if (mensagem === '') {
                iziToast.error({
                    title: 'Oooops!',
                    message: 'Por favor, preencha o campo Mensagem.',
                    timeout: 5000,
                    position: 'topCenter',
                });
                mensagemInput.focus(); // Foca no campo de mensagem
                return; // Sai da função para evitar enviar a requisição
            }

            let dados = $(this).serialize();

            $.ajax({
                dataType: 'json',
                method: 'POST',
                url: '{{ route("site.envia-contato") }}',
                data: dados,
                success: function(data) {
                    if (data.success) {
                        //Resetar campos do Formulário
                        $('#ajax_form').each(function() {
                            this.reset();
                        });
                        //Apresentar alert de sucesso
                        iziToast.success({
                            title: 'Sucesso!',
                            message: data.mensagem,
                            timeout: 1000,
                            zindex: 99999999,
                            position: 'topCenter',
                            onClosed: function() {
                                window.location.href = "{{ route('site.index') }}";
                            }
                        });
                    } else {
                        // Se houver erro, exibir a mensagem de erro usando iziToast
                        iziToast.error({
                            title: 'Oooops!',
                            message: data.mensagem,
                            timeout: 5000,
                            position: 'topCenter',
                            onClosed: function() {
                                window.location.href = "{{ route('site.index') }}";
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Se ocorrer um erro no AJAX, exibir uma mensagem genérica de erro
                    iziToast.error({
                        title: 'Erro!',
                        message: 'Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.',
                        timeout: 5000,
                        position: 'topCenter'
                    });
                }
            });
        });   
    });

    </script>

@endpush


@stack('scripts')

@endsection
