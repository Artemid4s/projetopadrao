{{------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 --------------------- Como o próprio nome diz, é uma view de template, onde incluímos o header e footer e o conteúdo vem conforme solicitado. -------------------------------------------------------
------------------------- Basta extender o template na sua respectiva view e definir a @section com conteudo-site ---------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}

@include('site.estrutura.header')

@yield('conteudo-site')

@include('site.estrutura.footer')
