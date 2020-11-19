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

    .smartphonebotao_deletado{
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

    .display_flex_card_header_admin{
        display: flex;
    }

    .display_flex_card_nome_admin{
        display:flex;
        margin-top: 0.3rem;
    }

    .display_flex_card_nome_admin_deletado{
        display:flex;
        margin-top: 0.3rem;
    }

    .espacamento_nome{
        padding-left: 5px;
    }

    .espacamento_nome_deletado{
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

@media only screen and (min-width: 320px) and (max-width: 665px){

    .display_flex_card_nome_admin{
            display:block;
            margin-top: 0rem;
        }

    .espacamento_nome{
            padding-left: 0px;
        }

}

@media only screen and (min-width: 320px) and (max-width: 350px){
    .margem_esquerda_responsivo_admin{
        margin-left: -19px;
    }

}

@media only screen and (min-width: 351px) and (max-width: 371px){
    .margem_esquerda_responsivo_admin{
        margin-left: -15px;
    }

}

@media only screen and (min-width: 372px) and (max-width: 400px){
    .margem_esquerda_responsivo_admin{
        margin-left: -12px;
    }

}

@media only screen and (min-width: 401px) and (max-width: 450px){
    .margem_esquerda_responsivo_admin{
        margin-left: -6px;
    }

}

@media only screen and (min-width: 500px) and (max-width: 550px){
        .smartphonebotao{
            margin-left: 15px;
    }
}

@media only screen and (min-width: 551px) and (max-width: 665px){
        .smartphonebotao{
            margin-left: 30px;
    }
}

@media only screen and (min-width: 320px) and (max-width: 607px){

    .display_flex_card_nome_admin_deletado{
            display:block;
            margin-top: 0rem;
        }

    .espacamento_nome_deletado{
            padding-left: 0;
        }

    .margem_esquerda_responsivo_admin_deletado{
            margin-left: -15px;
        }

}
@media only screen and (min-width: 360px) and (max-width: 400px){

    .smartphonebotao_deletado{
        margin-left: 10px;
    }

}


@media only screen and (min-width: 401px) and (max-width: 441px){

    .smartphonebotao_deletado{
        margin-left: 20px;
    }

}

@media only screen and (min-width: 442px) and (max-width: 570px){

    .smartphonebotao_deletado{
        margin-left: 40px;
    }

}

@media only screen and (min-width: 571px) and (max-width: 607px){

    .smartphonebotao_deletado{
        margin-left: 45px;
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
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
