@extends('layouts.app-chatResposta')

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
        <div class="card_flex">
            <div class="col-sm-8">
                <div>
                    <h1><b>{{ $sessao->value('nome') }}</b><h1>
                </div>
                <div class="card espacamento_entre_postagens">
                    <div class="display_flex_postagem">
                        <div class="col-sm-1">
                            <img class="imagem_perfil_postagem" src="/uploads/personagens/{{ $postagem->value('avatarPersonagem') }}">
                        </div>
                        <div class="col-sm-11 mensagem_postagem_margem">
                            <div class="display_flex">
                                <div class="col-sm-6 nome_personagem">
                                    <b class="font_18">{{ $postagem->value('nomePersonagem') }}</b>
                                </div>
                                <div class="col-sm-4 nome_alinhar_direita">
                                    @if ($postagem->value('nomeAluno') == null)
                                        <strong>{{ $postagem->value('nomeProfessor')}} {{ $postagem->value('sobrenomeProfessor')}}</strong>
                                        {{--<img src="/uploads/avatars/{{ $postagem->avatarProfessor}}" width="60" height="60">--}}
                                    @else
                                        <strong>{{ $postagem->value('nomeAluno')}} {{ $postagem->value('sobrenomeAluno')}}</strong>
                                        {{--<img src="/uploads/avatars/{{ $postagem->avatarAluno}}" width="60" height="60"> --}}  
                                    @endif
                                </div>
                                <div class="col-sm-2 nome_alinhar_direita">
                                    <a type="button" data-toggle="modal" data-target="#exclusao-postagem-{{ $postagem->value('id') }}">  
                                        <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' viewBox='0 0 512 512'><title>Excluir</title><line x1='368' y1='368' x2='144' y2='144' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='368' y1='144' x2='144' y2='368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                                    </a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exclusao-postagem-{{ $postagem->value('id') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($postagem->value('nomeAluno') == null)
                                                    <p>Você tem certeza que deseja excluir a postagem de <strong>{{ $postagem->value('nomeProfessor')}} {{ $postagem->value('sobrenomeProfessor')}}</strong> e suas respostas?</p> 
                                                @else
                                                    <p>Você tem certeza que deseja excluir a postagem de <strong> {{ $postagem->value('nomeAluno')}} {{ $postagem->value('sobrenomeAluno')}} </strong> e suas respostas?</p> 
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a class="btn btn btn-dark" href="{{ route('sessao.apagar.postagem.professor', $postagem->value('id')) }}">Excluir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <time class="font_18">{{ $postagemDataCarbon }}</time>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 margem_mensagem_destaque">
                        <p class="font_24">{{ $postagem->value('mensagem') }}</p>
                    </div>
                    @if($postagem->value('imagem') == null)
                    @else

                        <div class="imagem_postagem_destaque_margem">
                            <div class="background_imagem_postagem" >
                            <!-- Trigger the Modal -->
                                <img id="myImg" src="/uploads/postagens/{{ $postagem->value('imagem') }}"
                                class="imagem_postagem"
                                data-toggle="modal" data-target="#mostrar-imagem-{{ $postagem->value('id') }}" alt="imagem">
                            </div>
                        </div>

                        <!-- The Modal -->
                        <div id="mostrar-imagem-{{ $postagem->value('id') }}" class="modal">
                            <!-- The Close Button -->
                            <span class="close-image" class="close" data-dismiss="modal">&times;</span>
                            <!-- Modal Content (The Image) -->
                                <img class="modal-content-image" src="/uploads/postagens/{{ $postagem->value('imagem')}}">

                            <!-- Modal Caption (Image Text) 
                            <div id="caption-image"s>
                            </div>-->
                        </div>

                    @endif
                    <div class="display_flex_bate-papo">
                        <div class="col-sm-12 alinhar_texto_centro">
                            <svg id="botao-modal-2" data-toggle="modal" data-target="#abertura-modal-{{ $postagem->value('id') }}" style="cursor: pointer;" xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 512 512'><title>Bate-papo</title><path d='M431,320.6c-1-3.6,1.2-8.6,3.3-12.2a33.68,33.68,0,0,1,2.1-3.1A162,162,0,0,0,464,215c.3-92.2-77.5-167-173.7-167C206.4,48,136.4,105.1,120,180.9a160.7,160.7,0,0,0-3.7,34.2c0,92.3,74.8,169.1,171,169.1,15.3,0,35.9-4.6,47.2-7.7s22.5-7.2,25.4-8.3a26.44,26.44,0,0,1,9.3-1.7,26,26,0,0,1,10.1,2L436,388.6a13.52,13.52,0,0,0,3.9,1,8,8,0,0,0,8-8,12.85,12.85,0,0,0-.5-2.7Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M66.46,232a146.23,146.23,0,0,0,6.39,152.67c2.31,3.49,3.61,6.19,3.21,8s-11.93,61.87-11.93,61.87a8,8,0,0,0,2.71,7.68A8.17,8.17,0,0,0,72,464a7.26,7.26,0,0,0,2.91-.6l56.21-22a15.7,15.7,0,0,1,12,.2c18.94,7.38,39.88,12,60.83,12A159.21,159.21,0,0,0,284,432.11' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
                        </div>
                    </div>       
                </div>

                {{--Modal de resposta--}}
                <div class="modal fade" id="abertura-modal-{{ $postagem->value('id') }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Responder postagem</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <form action="{{ route('sessao.resposta.postagem', $postagem->value('id')) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <textarea id="mensagemPostagem_modal" class="textarea_chat border rounded" name="mensagemPostagem_modal" maxlength="276"
                                    placeholder="Responda a postagem!"></textarea>
                                </div>
                                <div class="modal-body">
                                    <div class="display_flex_imagem_preview_modal">
                                        <div class="col-sm-7">
                                            <select class="form-control" id="escolhaPersonagem_modal" name="escolhaPersonagem_modal">
                                                @forelse ($listaPersonagens as $personagem)
                                                    <option value="{{ $personagem->id }}">{{ $personagem->nome }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="display_flex_imagem_preview_modal_imagem col-sm-3">
                                            <div>
                                                <img id="output_modal" src="http://upload.wikimedia.org/wikipedia/commons/c/ce/Transparent.gif" width="36" height="36">
                                            </div>
                                            <div class="upload-btn-wrapper">
                                                <a type="submit" class="btn_upload">
                                                <svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 512 512'><title>Adicionar imagem</title><rect x='48' y='80' width='416' height='352' rx='48' ry='48' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><circle cx='336' cy='176' r='32' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px'/><path d='M304,335.79,213.34,245.3A32,32,0,0,0,169.47,244L48,352' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M224,432,347.34,308.66a32,32,0,0,1,43.11-2L464,368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                                                </a>
                                                <input id="imagem_chat_professor_modal" name="imagem_chat_professor_modal" type="file" accept="image/*" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                        <div class="alinhamento_direita col-sm-2">
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

                @forelse ($respostas as $resposta)
                <div class="card espacamento_entre_postagens">
                    <div class="display_flex_postagem">
                        <div class="col-sm-1">
                            <img class="imagem_perfil_postagem" src="/uploads/personagens/{{ $resposta->avatarPersonagem}}">
                        </div>
                        <div class="col-sm-11 mensagem_postagem_margem">
                            <div class="display_flex">
                                <div class="col-sm-6 nome_personagem">
                                    <b class="font_16">{{ $resposta->nomePersonagem}}</b>
                                    <b class="espacamento">-</b>
                                    <time>{{ $resposta->created_at->shortAbsoluteDiffForHumans()}}</time>
                                </div>
                                <div class="col-sm-4 nome_alinhar_direita">
                                    @if ($resposta->nomeAluno == null)
                                        <strong>{{ $resposta->nomeProfessor}} {{ $resposta->sobrenomeProfessor}}</strong>
                                        {{--<img src="/uploads/avatars/{{ $resposta->avatarProfessor}}" width="60" height="60">--}}
                                    @else
                                        <strong>{{ $resposta->nomeAluno}} {{ $resposta->sobrenomeAluno}}</strong>
                                        {{--<img src="/uploads/avatars/{{ $resposta->avatarAluno}}" width="60" height="60"> --}}  
                                    @endif
                                </div>

                                <div class="col-sm-2 nome_alinhar_direita">
                                        <a type="button" data-toggle="modal" data-target="#exclusao-resposta-{{ $resposta->value('id') }}">  
                                        <svg xmlns='http://www.w3.org/2000/svg' width='26' height='26' viewBox='0 0 512 512'><title>Excluir</title><line x1='368' y1='368' x2='144' y2='144' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='368' y1='144' x2='144' y2='368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                                    </a>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exclusao-resposta-{{ $resposta->value('id') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($resposta->value('nomeAluno') == null)
                                                    <p>Você tem certeza que deseja excluir a resposta de <strong>{{ $resposta->value('nomeProfessor')}} {{ $resposta->value('sobrenomeProfessor')}}</strong> ?</p> 
                                                @else
                                                    <p>Você tem certeza que deseja excluir a resposta de <strong> {{ $resposta->value('nomeAluno')}} {{ $resposta->value('sobrenomeAluno')}}</strong> ?</p> 
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a class="btn btn btn-dark" href="{{ route('sessao.apagar.resposta.professor', $resposta->value('id')) }}">Excluir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                {{ $resposta->mensagem }}
                            </div>
                            @if($resposta->imagem == null)
                            @else
                                <div class="imagem_postagem_resposta_margem">
                                    <div class="background_imagem_resposta" >
                                    <!-- Trigger the Modal -->
                                        <img id="myImg" src="/uploads/postagens/{{ $resposta->imagem }}"
                                        class="imagem_resposta"
                                        data-toggle="modal" data-target="#mostrar-imagem-{{ $resposta->id }}" alt="imagem">
                                    </div>
                                </div>
        
                                <!-- The Modal -->
                                <div id="mostrar-imagem-{{ $resposta->id }}" class="modal">
                                    <!-- The Close Button -->
                                    <span class="close-image" class="close" data-dismiss="modal">&times;</span>
                                    <!-- Modal Content (The Image) -->
                                        <img class="modal-content-image" src="/uploads/postagens/{{ $resposta->imagem }}">
        
                                    <!-- Modal Caption (Image Text) 
                                    <div id="caption-image"s>
                                    </div>-->
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
            Sem respostas.
            @endforelse


            </div>
            
            <div class="col-sm-4">
                <div id="listaNarradores">
                    <h1><b>Lista de narradores<b></h1>

                        @forelse ($listaPersonagens as $personagem)
                        
                            <div class="card">
                                <div id="heading{{ $personagem->id }}">
                                    <h5>

                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $personagem->id }}" aria-expanded="true" aria-controls="collapse{{ $personagem->id }}">
                                        <img class="imagem_perfil_lateral"
                                        src="/uploads/personagens/{{ $personagem->imagemPersonagem }}">
                                        {{ $personagem->nome }}
                                    </button>

                                    </h5>
                                </div>
                            
                                <div id="collapse{{ $personagem->id }}" class="collapse" aria-labelledby="heading{{ $personagem->id }}" data-parent="#listaNarradores">
                                    <div class="card-body">
                                        <div>
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
        var output = document.getElementById('output_modal');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
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