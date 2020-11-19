@extends('layouts.app-chat')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card_flex margem_responsivo_sm">
            <div class="col-lg-8 col-12">
                <div class="card_flex_header">
                    <div class="col-lg-9 col-9">
                        <h1 class="nome-da-sessao"><b>{{ $nomeDaSessao }}</b><h1>
                    </div>
                    @if ($listaPersonagens->isEmpty())
                        <div class="col-lg-3 col-3">
                        </div>
                    @else
                        <div id="the-count" class="card_flex col-lg-3 col-3">
                            <div class="padding_contagem_current" id="current">0</div>
                            <div class="padding_contagem_maximum" id="maximum">/ 276</div>
                        </div>
                    @endif
                </div>
                @if ($listaPersonagens->isEmpty())
                @else   
                    <form method="POST" action="{{ route('sessao.mensagem', $codigoDeAcesso) }}" enctype="multipart/form-data">
                        @csrf
                            <div>
                                <textarea id="mensagemPostagem" class="textarea_chat border rounded" name="mensagemPostagem" maxlength="276"
                                placeholder="Faça uma postagem!"></textarea>
                            </div>
                            <div class="espacamento_postagem">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-7">
                                    <select class="form-control" id="escolhaPersonagem" name="escolhaPersonagem">
                                        @forelse ($listaPersonagens as $personagem)
                                            <option value="{{ $personagem->id }}">{{ $personagem->nome }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-3 botao_narradores">
                                    <a class="btn btn-outline-dark" data-toggle="modal" data-target="#lista-narradores">Narradores</a>
                                </div>
                                <div class="col-md-2 col-sm-3 col-1 botao_narradores_2 teste-2">
                                    <a data-toggle="modal" data-target="#lista-narradores">
                                        <svg class="icones_criacao_postagem" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>narradores</title><path d='M402,168c-2.93,40.67-33.1,72-66,72s-63.12-31.32-66-72c-3-42.31,26.37-72,66-72S405,126.46,402,168Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M336,304c-65.17,0-127.84,32.37-143.54,95.41-2.08,8.34,3.15,16.59,11.72,16.59H467.83c8.57,0,13.77-8.25,11.72-16.59C463.85,335.36,401.18,304,336,304Z' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px'/><path d='M200,185.94C197.66,218.42,173.28,244,147,244S96.3,218.43,94,185.94C91.61,152.15,115.34,128,147,128S202.39,152.77,200,185.94Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M206,306c-18.05-8.27-37.93-11.45-59-11.45-52,0-102.1,25.85-114.65,76.2C30.7,377.41,34.88,384,41.72,384H154' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
                                    </a>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 teste">
                                    <div class="upload-btn-wrapper">
                                        <a type="submit" class="btn_upload">
                                        <svg class="icones_criacao_postagem" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>Adicionar imagem</title><rect x='48' y='80' width='416' height='352' rx='48' ry='48' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><circle cx='336' cy='176' r='32' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px'/><path d='M304,335.79,213.34,245.3A32,32,0,0,0,169.47,244L48,352' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M224,432,347.34,308.66a32,32,0,0,1,43.11-2L464,368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                                        </a>
                                        <input id="imagem_chat_professor" name="imagem_chat_professor" type="file" accept="image/*" onchange="loadFile(event)">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-1 col-md-1 col-sm-1 col-1">
                                    <img class="icones_criacao_postagem" id="output" src="http://upload.wikimedia.org/wikipedia/commons/c/ce/Transparent.gif">
                                </div>
                                <div class="col-xl-2 col-lg-5 col-md-3 col-sm-2 alinhamento_direita botao_enviar">
                                    <button class="btn btn-outline-dark" type="submit">
                                        Publicar
                                    </button>
                                </div>
                                <div class="col-xl-2 col-lg-5 col-md-3 col-sm-2 col-2 alinhamento_direita botao_enviar_2">
                                    <label>
                                        <input type="submit" hidden>
                                        <svg class="icones_criacao_postagem" xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512'><title>Enviar</title><path d='M470.3 271.15L43.16 447.31a7.83 7.83 0 01-11.16-7V327a8 8 0 016.51-7.86l247.62-47c17.36-3.29 17.36-28.15 0-31.44l-247.63-47a8 8 0 01-6.5-7.85V72.59c0-5.74 5.88-10.26 11.16-8L470.3 241.76a16 16 0 010 29.39z' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/></svg>
                                    </label>
                                </div>
                            </div>
                    </form> 
                @endif
                <div>
                    @forelse ($timeline as $postagens)
                        <div class="card espacamento_entre_postagens">
                            <div class="display_flex_postagem">
                                <div class="col-md-1 col-sm-1 col-1" onclick="location.href='{{ route('sessao.postagem', $postagens->id) }}';" style="cursor: pointer;">
                                    <img class="imagem_perfil_postagem" src="/uploads/personagens/{{ $postagens->avatarPersonagem}}">
                                </div>
                                <div class="col-md-11 col-sm-11 col-11 mensagem_postagem_margem">
                                    <div class="display_flex">
                                        <div class="col-md-6 col-sm-7 col-7 nome_personagem" onclick="location.href='{{ route('sessao.postagem', $postagens->id) }}';" style="cursor: pointer;">
                                            <b class="font_16">{{ $postagens->nomePersonagem}}</b>
                                            <b class="espacamento">-</b>
                                            <time>{{ $brasilCarbon->make($postagens->created_at)->shortAbsoluteDiffForHumans() }}</time>
                                        </div>
                                        <div class="col-md-4 col-sm-3 col-3 nome_criador_alinhar_direita" onclick="location.href='{{ route('sessao.postagem', $postagens->id) }}';" style="cursor: pointer;">
                                            @if ($postagens->nomeAluno == null)
                                                <strong>{{ $postagens->nomeProfessor}}</strong>
                                                {{--<img src="/uploads/avatars/{{ $postagens->avatarProfessor}}" width="60" height="60">--}}
                                            @else
                                                <strong>{{ $postagens->nomeAluno}}</strong>
                                                {{--<img src="/uploads/avatars/{{ $postagens->avatarAluno}}" width="60" height="60"> --}}  
                                            @endif
                                        </div>

                                        <div class="col-md-2 col-sm-2 col-2 nome_alinhar_direita">
                                            <a type="button" data-toggle="modal" data-target="#exclusao-postagem-{{ $postagens->id }}">  
                                                <svg class="icones_criacao_postagem_excluir" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>Excluir</title><line x1='368' y1='368' x2='144' y2='144' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='368' y1='144' x2='144' y2='368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                                            </a>
                                        </div>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exclusao-postagem-{{ $postagens->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($postagens->nomeAluno == null)
                                                            <p>Você tem certeza que deseja excluir a postagem de <strong>{{ $postagens->nomeProfessor}} {{ $postagens->sobrenomeProfessor}}</strong> e suas respostas?</p> 
                                                        @else
                                                            <p>Você tem certeza que deseja excluir a postagem de <strong> {{ $postagens->nomeAluno}} {{ $postagens->sobrenomeAluno}} </strong> e suas respostas?</p> 
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a class="btn btn btn-dark" href="{{ route('sessao.apagar.postagem.professor', $postagens->id) }}">Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div onclick="location.href='{{ route('sessao.postagem', $postagens->id) }}';" style="cursor: pointer;">
                                        {{ $postagens->mensagem }}
                                    </div>
                                    @if($postagens->imagem == null)
                                    @else
                                        <div class="imagem_postagem_margem">
                                            <div class="background_imagem_postagem" >
                                            <!-- Trigger the Modal -->
                                                <img id="myImg" src="/uploads/postagens/{{ $postagens->imagem }}"
                                                class="imagem_postagem"
                                                data-toggle="modal" data-target="#mostrar-imagem-{{ $postagens->id }}" alt="imagem">
                                            </div>
                                        </div>

                                        <!-- The Modal -->
                                        <div id="mostrar-imagem-{{ $postagens->id }}" class="modal">
                                            <!-- The Close Button -->
                                            <span class="close-image" class="close" data-dismiss="modal">&times;</span>
                                            <!-- Modal Content (The Image) -->
                                                <img class="modal-content-image" src="/uploads/postagens/{{ $postagens->imagem }}">

                                            <!-- Modal Caption (Image Text) 
                                            <div id="caption-image"s>
                                            </div>-->
                                        </div>

                                    @endif
                                    @if ($listaPersonagens->isEmpty())
                                    @else
                                        <div class="display_flex_bate-papo">
                                            <div class="col-md-5 col-5" onclick="location.href='{{ route('sessao.postagem', $postagens->id) }}';" style="cursor: pointer;">
                                            </div>
                                            <div class="col-md-2 col-2 alinhar_texto_centro">
                                                <a href="#" data-toggle="modal" data-target="#abertura-modal-{{ $postagens->id }}">
                                                <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 512 512'><title>Bate-papo</title><path d='M431,320.6c-1-3.6,1.2-8.6,3.3-12.2a33.68,33.68,0,0,1,2.1-3.1A162,162,0,0,0,464,215c.3-92.2-77.5-167-173.7-167C206.4,48,136.4,105.1,120,180.9a160.7,160.7,0,0,0-3.7,34.2c0,92.3,74.8,169.1,171,169.1,15.3,0,35.9-4.6,47.2-7.7s22.5-7.2,25.4-8.3a26.44,26.44,0,0,1,9.3-1.7,26,26,0,0,1,10.1,2L436,388.6a13.52,13.52,0,0,0,3.9,1,8,8,0,0,0,8-8,12.85,12.85,0,0,0-.5-2.7Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M66.46,232a146.23,146.23,0,0,0,6.39,152.67c2.31,3.49,3.61,6.19,3.21,8s-11.93,61.87-11.93,61.87a8,8,0,0,0,2.71,7.68A8.17,8.17,0,0,0,72,464a7.26,7.26,0,0,0,2.91-.6l56.21-22a15.7,15.7,0,0,1,12,.2c18.94,7.38,39.88,12,60.83,12A159.21,159.21,0,0,0,284,432.11' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
                                                </a>
                                            </div>
                                            <div class="col-md-5 col-5" onclick="location.href='{{ route('sessao.postagem', $postagens->id) }}';" style="cursor: pointer;">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{--Modal de resposta--}}
                        <div class="modal fade" id="abertura-modal-{{ $postagens->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Responder postagem</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                    </div>
                                    <form action="{{ route('sessao.resposta.postagem', $postagens->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <textarea id="mensagemPostagem_modal" class="textarea_chat border rounded" name="mensagemPostagem_modal" maxlength="276"
                                            placeholder="Responda a postagem!"></textarea>
                                        </div>
                                        <div class="modal-body">
                                            <div class="display_flex_imagem_preview_modal">
                                                <div class="col-sm-7 col-7">
                                                    <select class="form-control" id="escolhaPersonagem_modal" name="escolhaPersonagem_modal">
                                                        @forelse ($listaPersonagens as $personagem)
                                                            <option value="{{ $personagem->id }}">{{ $personagem->nome }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="display_flex_imagem_preview_modal_imagem col-sm-3 col-3">
                                                    <div>
                                                        <img id="output_modal" src="http://upload.wikimedia.org/wikipedia/commons/c/ce/Transparent.gif" width="36" height="36">
                                                    </div>
                                                    <div class="upload-btn-wrapper">
                                                        <a type="submit" class="btn_upload">
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 512 512'><title>Adicionar imagem</title><rect x='48' y='80' width='416' height='352' rx='48' ry='48' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><circle cx='336' cy='176' r='32' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px'/><path d='M304,335.79,213.34,245.3A32,32,0,0,0,169.47,244L48,352' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M224,432,347.34,308.66a32,32,0,0,1,43.11-2L464,368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                                                        </a>
                                                        <input id="imagem_chat_professor_modal" name="imagem_chat_professor_modal" type="file" accept="image/*" onchange="loadFile2(event)">
                                                    </div>
                                                </div>
                                                <div class="alinhamento_direita col-sm-2 col-2">
                                                    <button class="btn btn-outline-dark" type="submit">
                                                        Publicar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    @empty
                    Sem postagens.
                    @endforelse
                </div>
            </div>
            
            <div id="lista-narradores" class="col-lg-4 modal-lista">
                <div id="listaNarradores">
                    <div class="card_header_narradores card_header_narradores_modal">
                    <h1><b>Narradores</b></h1>
                    </div>

                        @forelse ($listaPersonagens as $personagem)
                        
                            <div class="card">
                                <div id="heading{{ $personagem->id }}">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $personagem->id }}" aria-expanded="true" aria-controls="collapse{{ $personagem->id }}">
                                        <div>
                                            <img class="imagem_perfil_lateral"
                                            src="/uploads/personagens/{{ $personagem->imagemPersonagem }}">
                                        </div>
                                        <div style="font-size: 15px; color:black;">
                                            {{ $personagem->nome }}
                                        </div>
                                    </button>
                                </div>
                            
                                <div id="collapse{{ $personagem->id }}" class="collapse" aria-labelledby="heading{{ $personagem->id }}" data-parent="#listaNarradores">
                                    <div class="borda-descricao">
                                    </div>
                                        <div class="espacamento_descricao">
                                            <div style="text-align:center;">
                                                Descrição:
                                            </div>
                                            <div>
                                                {{ $personagem->descricaoPersonagem }}
                                            </div>
                                        </div>
                                </div>
                            </div>
                        
                        @empty
                            Sem personagens narradores criados.
                        @endforelse
                </div>
            </div>
        </div> 
    </div>
    
<script>

    //mostrar preview da imagem
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.border='1px dashed black';
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };

    //mostrar preview da imagem
    var loadFile2 = function(event) {
        var output2 = document.getElementById('output_modal');
        output2.src = URL.createObjectURL(event.target.files[0]);
        output2.style.border='1px dashed black';
        output2.onload = function() {
        URL.revokeObjectURL(output2.src) // free memory
        }
    };

    //contador do textarea
    $('textarea').keyup(function() {
    
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
    current.text(characterCount);
   
    
    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
      current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
      current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
      current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
      current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
      current.css('color', '#8f0001');
    }
    
    if (characterCount >= 140) {
      maximum.css('color', '#8f0001');
      current.css('color', '#8f0001');
      theCount.css('font-weight','bold');
    } else {
      maximum.css('color','#666');
      theCount.css('font-weight','normal');
    }
    
        
  });
</script>
@endsection