@extends('layouts.app-professor')

@section('content')
<div class="container-fluid">
    <div class="card tamanho_de_tela">
        <div class="card-header">
            <div class="alinhar_texto">
                <b style="font-size: 22px;">Criação de personagens</b>
            </div>
        </div>
        {{--@if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif--}}
        <div class="display_flex_no_card">
            <div class="col-lg-4 col-md-3 col-sm-12 alinhar_texto">
                    <form method="POST" action="{{ route('professor.personagens.store', $parametro) }}" enctype="multipart/form-data">
                        @csrf
                            <div class="layout_top_bottom_nome">
                                <b class="font_20">Nome do personagem</b>
                            </div>
                            <div class="tamanho_inputs">
                                <input class="form-control borda_nome_preto" id="nomePersonagem" name="nomePersonagem" type="text" 
                                maxlength="26"
                                required>
                            </div>
                            <div class="layout_top_bottom">
                                <b class="font_20">Descrição</b>
                            </div>
                            <div class="tamanho_inputs">
                                <textarea class="form-control borda_nome_preto" id="descricaoPersonagem" rows="4" name="descricaoPersonagem" 
                                maxlength="105"
                                required></textarea>
                            </div>
                            <div class="layout_top">
                                <b class="font_20">Insira imagem</b>
                            </div>
                            <div>
                                <img id="image_preview_container" src="/uploads/avatars/default.jpg" class="imagem_personagem_criacao" alt="preview image">
                            </div>

                            <div class="card-text layout_top_bottom">
                                <div class="upload-btn-wrapper">
                                    <button type="submit" class="btn_upload">Escolha uma foto
                                        <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 512 512'><title>Escolha uma imagem</title><path d='M320,367.79h76c55,0,100-29.21,100-83.6s-53-81.47-96-83.6c-8.89-85.06-71-136.8-144-136.8-69,0-113.44,45.79-128,91.2-60,5.7-112,43.88-112,106.4s54,106.4,120,106.4h56' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='320 255.79 256 191.79 192 255.79' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='256' y1='448.21' x2='256' y2='207.79' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                                    </button>
                                        <input
                                            type="file"
                                            name="imagemPersonagem"
                                            id="imagemPersonagem"
                                            required>
                                </div>
                            </div>

                            <div>
                                <b class="font_20">Selecione o tipo</b>
                            </div>

                            <div class="form-group tamanho_inputs_select">
                                <select class="form-control borda_nome_preto" id="tipoPersonagem" name="tipoPersonagem"  
                                required>
                                    <option value="1" style="border: 1px solid black;">Geral</option>
                                    <option value="2" style="border: 1px solid black;">Narrador</option>
                                </select>
                              </div>

                            <div>
                                <button class="btn btn-outline-dark tamanho_botao" type="submit"
                                required>
                                Adicionar à lista</button>
                            </div>
                    </form>
            </div>
            <div class="col-lg-8 col-md-9 col-sm-12 alinhar_texto">
                <div class="layout_top_bottom_lista">
                    <b class="font_20">Lista de personagens</b>
                </div>
                <div class="tamanho_lista_geral">
                    @forelse ($personagens as $personagemI) 
                        <div class="display_flex_no_card_2">
                            <div class="col-lg-2 col-md-2 col-sm-2 borda_direita_embaixo_responsivo">
                                <div class="font_16">
                                    <b>Nome:</b>
                                </div>
                                <div class="overflow_nome">
                                    {{ $personagemI->nome }}
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 borda_direita_embaixo tipo_altura_responsivo">
                                @if($personagemI->tipoPersonagem == 1)
                                    <div class="font_16">
                                        <b>Tipo:</b>
                                    </div>
                                    <div>
                                        Geral
                                    </div>
                                @else
                                    <div class="font_16">
                                        <b>Tipo:</b>
                                    </div>
                                    <div>
                                        Narrador
                                    </div>
                                @endif 
                            </div>

                            <div class="col-lg-4 col-md-3 col-sm-3 borda_direita_embaixo">
                                <div class="font_16">
                                    <b>Descrição:</b>
                                </div>
                                <div class="overflow_descricao">
                                    {{ $personagemI->descricaoPersonagem }}
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3 col-sm-3 borda_direita_embaixo">
                                <div class="font_16">
                                    <b>Imagem:</b>
                                </div>
                                <div> 
                                    <img src="/uploads/personagens/{{ $personagemI->imagemPersonagem }}" class="imagem_personagens_tabela">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 borda_direita_embaixo botao_responsivo">
                                <div class="centralizar_botoes_responsivo">
                                    <div class="layout_botao_editar">
                                        <a href="{{ route('personagem.tela.edicao', $personagemI->id) }}" class="btn btn-outline-dark">Editar</a>
                                    </div>
                                    <div class="layout_botao_excluir">
                                        <a data-toggle="modal" data-target="#exclusao-personagem-{{ $personagemI->id }}" class="btn btn-outline-dark">Excluir</a>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exclusao-personagem-{{ $personagemI->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que deseja excluir o personagem {{$personagemI->nome}}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn btn-dark" href="{{ route('personagem.excluir', $personagemI->id) }}">Excluir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="espaco_entre_sessao">
                        </div>
                    @empty
                        <div class="alinhar_texto">
                            <b>Essa sessão não tem nenhum personagem, tente criar um!</b>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

{!! $personagens->links() !!}

    <script>
        $(document).ready(function (e) {
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
            });
           
            $('#imagemPersonagem').change(function(){
                    
             let reader = new FileReader();
         
             reader.onload = (e) => { 
         
               $('#image_preview_container').attr('src', e.target.result); 
             }
         
             reader.readAsDataURL(this.files[0]); 
           
            });   
  });
        </script>
@endsection
