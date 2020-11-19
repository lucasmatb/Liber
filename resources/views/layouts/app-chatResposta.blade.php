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

    .font_18{
        font-size: 18px;
    }

    .font_20{
        font-size: 20px;
    }

    .font_24{
        font-size: 24px;
    }
/*view chatProfessor*/
    .image-upload>input {
            display: none;
            }
    .card_flex{
        display: flex;
    }
    .textarea_chat{
        width:100%; 
        height:75px; 
        border:none; 
        resize: none;
    }
    .espacamento_postagem{
        display: flex;
        padding-bottom: 10px;
        padding-top: 5px;
        margin-left: -15px;
        margin-right: -15px;
    }

    .alinhamento_direita{
        text-align: right;
    }

    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    .espacamento_entre_postagens{
        margin-top: 10px; 
        margin-bottom: 40px;
    }

    .imagem_perfil_postagem{
        width:60px; 
        height:60px; 
        border-radius:50%

    }

    .display_flex_postagem{
        display: flex;
        padding: 8px 0;
    }

    .mensagem_postagem_margem{
        padding: 0 15px 0 35px;
    }
    
    .display_flex{
        display: flex;
    }

    .alinhar_texto_centro{
        text-align: center;
    }

    .display_flex_imagem_preview{
        display: flex;
        padding-left: 155px;
    }

    .display_flex_imagem_preview_modal{
        display: flex;

    }

    .nome_personagem{
        margin-left: -15px;
        margin-right: 30px;
    }

    .nome_alinhar_direita{
        text-align:right;
    }

    .imagem_postagem_destaque_margem {
        margin: 0 15px;
    }

    .imagem_postagem_resposta_margem {
        margin: 5px 5px 5px 0;
    }

    .background_imagem_resposta{
        width:570px; 
        height:260px;
        background-color: #EFEFEF; 
        border-radius: 1.25rem;
    }

    .imagem_resposta{
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        width:570px; 
        height:260px;
        border-radius: 1.25rem;
    }

    .margem_mensagem_destaque{
        margin-bottom: -10px;
    }

    .display_flex_bate-papo{
        display: flex;
        padding: 5px 0;
    }

    .form-control{
        height: 36px;
        width: 60%;
    }

    .btn-outline-dark{
        padding-top: 6px;
        padding-bottom: 6px;
    }

    strong{
        color:red;
    }

    .btn-link{
        color:#3a577c;
        font-weight: 900;
        font-size: 16px;
    }

    .btn-link:hover {
    color: #5ce8fe;
    text-decoration: none;
    }

    .btn-link:focus,
    .btn-link.focus {
        text-decoration: none
    }

    .card-body{
        padding: 0.5rem 1.25rem;
    }

    .imagem_perfil_lateral{
        width:60px; 
        height:60px; 
        border-radius:50%
    }
    time{
        color: rgb(101, 119, 134);
        font-size: 15px;
    }
    .espacamento{
        color: rgb(101, 119, 134);
        font-size: 16px;
        padding: 0 5px;
    }
    #the-count {
        font-size: 0.875rem;
    }

    .card_flex_header{
        display: flex;
        margin-left: -15px;
        margin-right: -15px;
    }

    /*modal*/

    
    .display_flex_imagem_preview_modal{
        display: flex;
        margin: -15px 15px 0 -15px;

    }

    .display_flex_imagem_preview_modal_imagem{
        display:flex;
    }

    .background_imagem_postagem {
        width:100%; 
        height:300px;
        background-color: #EFEFEF; 
        border-radius: 1.25rem;
    }

    .imagem_postagem{
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        width:100%; 
        height:300px;
        border-radius: 1.25rem;
    }

    /*modal imagem*/

    /* Style the Image Used to Trigger the Modal */
    #myImg {
    cursor: pointer;
    transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    .modal-content-image {
    margin: auto;
    display: block;
    max-width: 700px;
    }

    /* Caption of Modal Image (Image Text) - Same Width as the Image 
    #caption-image {
    margin: auto;
    display: block;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
    }*/

    /* The Close Button */
    .close-image {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close-image:hover,
    .close-image:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content-image {
            width: 100%;
        }
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                @switch($i = true)
                @case(Auth::guard('professor')->check())
                <a class="navbar-brand" href="{{ route('sessao.acesso.professor', $sessao->value('codigoDeAcesso')) }}">
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
                        @guest('professor')
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