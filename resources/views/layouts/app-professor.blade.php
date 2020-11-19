<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Liber') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Styles -->

    <style>
/*layout app-professor*/
    .imagem-perfil{

        width:50px; 
        height:50px; 
        border-radius:50%

    }

    .mensagem-erro{
        font-size:12px;
        color: red;
    }

    .navbar-dropdown-ajuste{
        padding: 0 10px 0px 0;
    }

    .logout-display-off{

        display: none;

    }

    .footer_correcao{
        position: absolute;
        margin-top: -22px;
        text-align: center;
        width: 100%;
    }

    .font_16{
        font-size: 16px;
    }

    .font_20{
        font-size: 20px;
    }

/*view personagens*/

    .tamanho_de_tela{
        height: auto;
        
    }

    .smartphonebotao2{
        text-align: right;
    }

    .display_flex_no_card{
        display: flex;
    }

    .display_flex_no_card_2{
        display: flex;
    }

    .overflow_nome{
        height: 80px;
        overflow: auto;
    }
    
    .overflow_descricao{
        height: 80px;
        overflow: auto;
    }

    .tamanho_lista_geral{
        border: 1px solid lightgray;
        height: 737px;
        overflow-y: scroll;
        margin: 0 -16px;
    }

    .imagem_personagens_tabela{
        width:80px; 
        height:80px; 
        border-radius:50%
    }

    .imagem_personagem_criacao{
        width:120px; 
        height:120px; 
        border-radius:50%;
    }

    .imagem_troca_avatar{
        width:150px; 
        height:150px; 
        border-radius:50%
    }

    .borda_nome_preto{
        border-color: black;
        color: black;
    }

    .borda_direita_embaixo{
        border-right: 1px solid lightgray;
        border-bottom: 1px solid lightgray;
    }

    .borda_direita_embaixo_responsivo{
        border-right: 1px solid lightgray;
        border-bottom: 1px solid lightgray;
    }

    .borda_embaixo{
        border-bottom: 1px solid lightgray;
    }

    .layout_top_bottom{
        padding: 18px 0;
    }

    .layout_top_bottom_nome{
        padding: 10px 0;
    }

    .layout_top{
        padding-top: 10px;
    }
    .layout_botao_editar{
        padding-top: 10px;
    }
    .layout_botao_excluir{
        padding-top: 10px;
    }
    .layout_arrumar_tabela{
        padding-top: 20px;
    }

    .botao_layout_top_bottom{
        padding: 20px 30%;       
    }

    .botao_adicionar_personagens{
        font-size: 16px;
        width: 200px;
    }

    .layout_top_bottom_lista{
        padding: 10px 0;
    }

    .tamanho_inputs{
        padding: 0 15%;
    }

    .tamanho_inputs_select{
        padding: 15px 30%;
    }

    .tamanho_botao{
        padding: 8px 40px;
        font-size: 16px;
    }

/*responsivo personagens*/
    /*responsivo celular*/

    @media only screen and (min-width: 320px) and (max-width: 575px) {
        .display_flex_no_card{
            display: block;
        }
        .display_flex_no_card_2{
            display: block;
        }

        .tamanho_lista_geral{
            border: 1px solid lightgray;
            height: 500px;
            overflow-y: scroll;
            margin: 0 -16px;
        }

        .overflow_nome{
            height: auto;
            max-height: 55px;
            max-width: 280px;
            overflow: auto;
            margin: 0 auto;
        }

        .overflow_descricao{
            height: auto;
            max-height: 95px;
            max-width: 280px;
            overflow: auto;
            margin: 0 auto;
        }

        .tipo_altura_responsivo{
            height: 55px;
        }

        .botao_responsivo{
            display: flex;
            padding-bottom: 10px;
        }

        .layout_botao_editar{
            margin-right: 5px;
        }
        .layout_botao_excluir{
            margin-left: 5px;
        }

        .espaco_entre_sessao{
            margin: 30px 0px;
        }

        .borda_direita_embaixo_responsivo{
            border-top: 1px solid lightgray;
        }

        .tamanho_inputs_select{
            padding: 15px 28%;
        }

        .centralizar_botoes_responsivo{
            display: flex;
            max-width: 50%;
            margin: 0 auto;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .display_flex_no_card{
            display: block;
        }

        .tamanho_lista_geral{
            border: 1px solid lightgray;
            height: 500px;
            overflow-y: scroll;
            margin: 0 -16px;
        }

    }

    /*arrumando layout médio*/
    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .tamanho_inputs_select{
            padding: 15px 15%;
        }

        .tamanho_inputs{
            padding: 0;
        }

        .tamanho_botao{
            padding: 6px 18px;
            font-size: 16px;
        }
    }

/*view personagem-edicao*/
    .layout_botao{
            margin-top: -10px;
        }

    .centralizar_inputs{
        max-width: 70%;
        margin: 0 auto;
    }

    .centralizar_select{
        max-width: 50%;
    }

    .tamanho_inputs_select_edicao{
        padding: 5px 30%;
    }

    .layout_arrumar_titulo{
        margin: -5px 0;
    }

    @media only screen and (min-width: 320px) and (max-width: 575px) {

        .tamanho_inputs_select_edicao{
            padding: 5px 28%;
        }

    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .tamanho_inputs_select_edicao{
            padding: 5px 15%;
        }

    }

/*view professor*/
    .alinhar_texto{
            text-align: center;
        }

    .suas-sessoes{
        padding-bottom: 10px;
    }

    .list-group-item {
            position: relative;
            display: block;
            padding: 0.75rem 1.25rem;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
    }

    .tamanho-cada-sessao{
            width: 18rem;
        }

    .smartphonebotao{
            text-align: right;
        }

    .uplineout{
            border-top: white;
    }

    .layout_top_bottom_sessao{
        padding: 5px 0;
    }

    .font_18{
        font-size: 18px;
    }

    .display_flex_card_header_professor{
        display: flex;
    }

    .display_flex_card_nome{
        display:flex;
        margin-top: 0.3rem;
    }

    .espacamento_nome{
        padding-left: 5px;
    }

    /*arrumando responsivo*/
    @media only screen and (min-width: 320px) and (max-width: 328px) {
        .tamanho-cada-sessao{
            width: 15.7rem;
        }

        .smartfoneSessoes {
            padding-left: 0.5%;
        }
    }

    @media only screen and (min-width: 329px) and (max-width: 338px) {
        .tamanho-cada-sessao{
            width: 16.4rem;
        }
    }

    @media only screen and (min-width: 339px) and (max-width: 348px) {
        .tamanho-cada-sessao{
            width: 16.5rem;
        }

        .smartfoneSessoes {
            padding-left: 1%;
        }
    }

    @media only screen and (min-width: 349px) and (max-width: 359px) {
        .tamanho-cada-sessao{
            width: 17.3rem;
        }

        .smartfoneSessoes {
            padding-left: 0.5%;
        }
    }

    @media only screen and (min-width: 360px) and (max-width: 369px) {
        .smartfoneSessoes {
            padding-left: 1%;
        }
    }

    @media only screen and (min-width: 370px) and (max-width: 377px) {
        .smartfoneSessoes {
            padding-left: 2.5%;
        }
    }

    @media only screen and (min-width: 378px) and (max-width: 389px) {
        .smartfoneSessoes {
            padding-left: 4%;
        }
    }

    @media only screen and (min-width: 390px) and (max-width: 399px) {
        .smartfoneSessoes {
            padding-left: 6%;
        }
    }

    @media only screen and (min-width: 400px) and (max-width: 410px) {
        .smartfoneSessoes {
            padding-left: 7%;
        }
    }

    @media only screen and (min-width: 411px) and (max-width: 430px) {
        .smartfoneSessoes {
            padding-left: 10%;
        }
    }

    @media only screen and (min-width: 431px) and (max-width: 441px) {
        .smartfoneSessoes {
            padding-left: 12%;
        }
    }

    @media only screen and (min-width: 442px) and (max-width: 450px) {
        .smartfoneSessoes {
            padding-left: 12.5%;
        }
    }

    @media only screen and (min-width: 451px) and (max-width: 460px) {
        .smartfoneSessoes {
            padding-left: 14%;
        }
    }

    @media only screen and (min-width: 461px) and (max-width: 481px) {
        .smartfoneSessoes {
            padding-left: 15%;
        }
    }

    @media only screen and (min-width: 482px) and (max-width: 511px) {
        .smartfoneSessoes {
            padding-left: 17%;
        }
    }

    @media only screen and (min-width: 512px) and (max-width: 544px) {
        .smartfoneSessoes {
            padding-left: 19%;
        }
    }

    @media only screen and (min-width: 545px) and (max-width: 580px) {
        .smartfoneSessoes {
            padding-left: 21.5%;
        }
    }

    @media only screen and (min-width: 581px) and (max-width: 611px) {
        .smartfoneSessoes {
            padding-left: 22.5%;
        }
    }

    @media only screen and (min-width: 612px) and (max-width: 650px) {
        .smartfoneSessoes {
            padding-left: 24%;
        }
    }

    @media only screen and (min-width: 651px) and (max-width: 690px) {
        .smartfoneSessoes {
            padding-left: 25%;
        }
    }

    /*quebra de tela para duas sessoes*/

    @media only screen and (min-width: 700px) and (max-width: 710px){
        .smartfoneSessoes {
            padding-left: 1.9%;
        }
    }

    @media only screen and (min-width: 711px) and (max-width: 731px){
        .smartfoneSessoes {
            padding-left: 3.6%;
        }
    }

    @media only screen and (min-width: 732px) and (max-width: 752px){
        .smartfoneSessoes {
            padding-left: 5.3%;
        }
    }

    @media only screen and (min-width: 753px) and (max-width: 773px){
        .smartfoneSessoes {
            padding-left: 7%;
        }
    }

    @media only screen and (min-width: 774px) and (max-width: 794px){
        .smartfoneSessoes {
            padding-left: 8.5%;
        }
    }

    @media only screen and (min-width: 795px) and (max-width: 815px){
        .smartfoneSessoes {
            padding-left: 10%;
        }
    }

    @media only screen and (min-width: 816px) and (max-width: 836px){
        .smartfoneSessoes {
            padding-left: 11.5%;
        }
    }

    @media only screen and (min-width: 837px) and (max-width: 857px){
        .smartfoneSessoes {
            padding-left: 12%;
        }
    }

    @media only screen and (min-width: 858px) and (max-width: 878px){
        .smartfoneSessoes {
            padding-left: 12.5%;
        }
    }

    @media only screen and (min-width: 879px) and (max-width: 899px){
        .smartfoneSessoes {
            padding-left: 13%;
        }
    }

    @media only screen and (min-width: 900px) and (max-width: 920px){
        .smartfoneSessoes {
            padding-left: 13.5%;
        }
    }

    @media only screen and (min-width: 921px) and (max-width: 941px){
        .smartfoneSessoes {
            padding-left: 14%;
        }
    }

    @media only screen and (min-width: 942px) and (max-width: 962px){
        .smartfoneSessoes {
            padding-left: 14.5%;
        }
    }

    @media only screen and (min-width: 963px) and (max-width: 995px){
        .smartfoneSessoes {
            padding-left: 15%;
        }
    }

/*quebra de tela para 3 sessoes*/

        @media only screen and (min-width: 1006px) and (max-width: 1016px){
        .smartfoneSessoes {
            padding-left: 1%;
        }
    }

    @media only screen and (min-width: 1017px) and (max-width: 1037px){
        .smartfoneSessoes {
            padding-left: 2.2%;
        }
    }

    @media only screen and (min-width: 1038px) and (max-width: 1058px){
        .smartfoneSessoes {
            padding-left: 4.3%;
        }
    }

    @media only screen and (min-width: 1059px) and (max-width: 1079px){
        .smartfoneSessoes {
            padding-left: 5.5%;
        }
    }

    @media only screen and (min-width: 1080px) and (max-width: 1100px){
        .smartfoneSessoes {
            padding-left: 6.2%;
        }
    }

    @media only screen and (min-width: 1101px) and (max-width: 1121px){
        .smartfoneSessoes {
            padding-left: 6.9%;
        }
    }

    @media only screen and (min-width: 1122px) and (max-width: 1142px){
        .smartfoneSessoes {
            padding-left: 7.3%;
        }
    }

    @media only screen and (min-width: 1143px) and (max-width: 1163px){
        .smartfoneSessoes {
            padding-left: 7.8%;
        }
    }

    @media only screen and (min-width: 1164px) and (max-width: 1184px){
        .smartfoneSessoes {
            padding-left: 8.5%;
        }
    }

    @media only screen and (min-width: 1185px) and (max-width: 1205px){
        .smartfoneSessoes {
            padding-left: 9%;
        }
    }

    @media only screen and (min-width: 1206px) and (max-width: 1226px){
        .smartfoneSessoes {
            padding-left: 9.3%;
        }
    }

    @media only screen and (min-width: 1227px) and (max-width: 1228px){
        .smartfoneSessoes {
            padding-left: 9.6%;
        }
    }

    @media only screen and (min-width: 1229px) and (max-width: 1249px){
        .smartfoneSessoes {
            padding-left: 9.9%;
        }
    }

    @media only screen and (min-width: 1250px) and (max-width: 1270px){
        .smartfoneSessoes {
            padding-left: 10.9%;
        }
    }

    @media only screen and (min-width: 1271px) and (max-width: 1303px){
        .smartfoneSessoes {
            padding-left: 11.2%;
        }
    }

/*quebra de tela para 4 sessoes*/

    @media only screen and (min-width: 1314px) and (max-width: 1334px){

        .smartfoneSessoes {
            padding-left: 0.8%;
        }

    }

    @media only screen and (min-width: 1335px) and (max-width: 1355px){

        .smartfoneSessoes {
            padding-left: 2.4%;
        }
    }

    @media only screen and (min-width: 1356px) and (max-width: 1376px){

        .smartfoneSessoes {
            padding-left: 3.4%;
        }

    }

    @media only screen and (min-width: 1377px) and (max-width: 1397px){

        .smartfoneSessoes {
            padding-left: 3.8%;
        }

    }

    @media only screen and (min-width: 1398px) and (max-width: 1418px){

        .smartfoneSessoes {
            padding-left: 4.4%;
        }

    }

    @media only screen and (min-width: 1419px) and (max-width: 1439px){

        .smartfoneSessoes {
            padding-left: 5%;
        }

    }

    @media only screen and (min-width: 1440px) and (max-width: 1460px){

        .smartfoneSessoes {
            padding-left: 5.6%;
        }

    }

    @media only screen and (min-width: 1461px) and (max-width: 1481px){

        .smartfoneSessoes {
            padding-left: 6.4%;
        }

    }

    @media only screen and (min-width: 1482px) and (max-width: 1502px){

        .smartfoneSessoes {
            padding-left: 6.9%;
        }

    }

    @media only screen and (min-width: 1503px) and (max-width: 1523px){

        .smartfoneSessoes {
            padding-left: 7.6%;
        }

    }

    @media only screen and (min-width: 1524px) and (max-width: 1544px){

        .smartfoneSessoes {
            padding-left: 8.2%;
        }

    }
    @media only screen and (min-width: 1545px) and (max-width: 1565px){

        .smartfoneSessoes {
            padding-left: 8.6%;
        }

    }

    @media only screen and (min-width: 1566px) and (max-width: 1586px){

        .smartfoneSessoes {
            padding-left: 9%;
        }

    }

    @media only screen and (min-width: 1587px) and (max-width: 1611px){

        .smartfoneSessoes {
            padding-left: 9.3%;
        }

    }

/*quebra de tela para 5 sessoes*/

    @media only screen and (min-width: 1622px) and (max-width: 1642px){

        .smartfoneSessoes {
            padding-left: 0.6%;
        }

    }

    @media only screen and (min-width: 1643px) and (max-width: 1663px){

        .smartfoneSessoes {
            padding-left: 1.9%;
        }

    }

    @media only screen and (min-width: 1664px) and (max-width: 1684px){

        .smartfoneSessoes {
            padding-left: 2.7%;
        }

    }

    @media only screen and (min-width: 1685px) and (max-width: 1705px){

        .smartfoneSessoes {
            padding-left: 3.3%;
        }

    }

    @media only screen and (min-width: 1706px) and (max-width: 1726px){

        .smartfoneSessoes {
            padding-left: 3.9%;
        }

    }

    @media only screen and (min-width: 1727px) and (max-width: 1747px){

        .smartfoneSessoes {
            padding-left: 4.3%;
        }

    }

    @media only screen and (min-width: 1748px) and (max-width: 1768px){

        .smartfoneSessoes {
            padding-left: 4.7%;
        }

    }

    @media only screen and (min-width: 1769px) and (max-width: 1789px){

        .smartfoneSessoes {
            padding-left: 5.2%;
        }

    }

    @media only screen and (min-width: 1790px) and (max-width: 1810px){

        .smartfoneSessoes {
            padding-left: 5.7%;
        }

    }

    @media only screen and (min-width: 1811px) and (max-width: 1831px){

        .smartfoneSessoes {
            padding-left: 6.1%;
        }

    }

    @media only screen and (min-width: 1832px) and (max-width: 1852px){

        .smartfoneSessoes {
            padding-left: 6.4%;
        }

    }

    @media only screen and (min-width: 1853px) and (max-width: 1873px){

        .smartfoneSessoes {
            padding-left: 6.8%;
        }

    }

    @media only screen and (min-width: 1874px) and (max-width: 1894px){

        .smartfoneSessoes {
            padding-left: 7.7%;
        }

    }

    @media only screen and (min-width: 1895px) and (max-width: 1919px){

        .smartfoneSessoes {
            padding-left: 8%;
        }

    }

    /*arrumar botão criar sessão*/

    @media only screen and (min-width: 320px) and (max-width: 475px){

    .display_flex_card_nome{
            display:block;
            margin-top: 0rem;
        }

    .espacamento_nome{
            padding-left: 0;
        }

    .margem_esquerda_responsivo{
        margin-left: -6px;
    }

    }

/*view trocaSenhaProfessor*/

    @media only screen and (min-width: 691px) and (max-width: 767px) {

        .col-md-4{
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .col-md-4{
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

/*view trocaFotoProfessor*/

    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn_upload {
        border: 2px solid gray;
        color: black;
        background-color: white;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 16px;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    .espacamento_imagem{
        margin-top: 20px;
    }

/*view chatProfessor*/
    .image-upload>input {
            display: none;
            }
    .display_flex_no_card_chat{
        display: flex;
    }
    .textarea_chat{
        width:100%; 
        height:75px; 
        border:none; 
        resize: none;
    }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                @switch($i = true)
                @case(Auth::guard('professor')->check())
                <a class="navbar-brand" href="{{ route('professor.dashboard') }}">
                    {{ config('app.name', 'Liber') }}
                </a>
                    @break
                @case(Auth::guard('admin')->check())
                <a class="navbar-brand" href="{{ route('admin.index') }}">
                    {{ config('app.name', 'Liber') }}
                </a>
                    @break
                @case(Auth::check())
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Liber') }}
                </a>
                    @break
                @default
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    {{ config('app.name', 'Liber') }}
                </a>
                @endswitch

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('professor.register') }}">{{ __('Cadastro') }}</a>
                                </li>
                        @else

                        <div class="btn-group dropdown">
                            <a class="dropdown-toggle navbar-dropdown-ajuste btn shadow-none" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::guard('professor')->user()->name }} <img class="imagem-perfil" src="/uploads/avatars/{{ Auth::guard('professor')->user()->avatar }}" alt="seu avatar">
                            </a>

                            <div class="dropdown-menu" style="position:absolute;">
                                <a class="dropdown-item" href="{{ route('foto.professor', ['id' => Auth::guard('professor')->user()->id]) }}">Foto de perfil</a>
                                <a class="dropdown-item" href="{{ route('trocaDeSenha.professor', ['id' => Auth::guard('professor')->user()->id]) }}">Trocar senha</a>
                                <a class="dropdown-item" href="{{ route('professor.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout</a>
                                <form id="logout-form" class="logout-display-off" action="{{ route('professor.logout') }}" method="POST">
                                    @csrf
                                </form>
                            </div>

                        </div>

                        @endguest
                    </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="font-small blue">

        <div class="footer_correcao">© 2020 Copyright:
          <a>Liber</a>
        </div>
      
    </footer>
</body>
</html>