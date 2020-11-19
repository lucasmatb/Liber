@extends('layouts.app-professor')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-1">

            <form method="POST" action="{{ route('personagem.edicao', $id) }}" enctype="multipart/form-data">
                @csrf
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

                <div class="card text-center">

                    <div class="card-header">
                        <b class="font_20">Edição de personagem</b>
                    </div>

                    <div class="card-body text-center">

					<div class="card-body">
						<b class="font_20">Nome do personagem</b>
					</div>
                    <div class="card-text centralizar_inputs">
                        <input class="form-control borda_nome_preto" id="nomePersonagemEdit" value="{{$personagemNome}}" name="nomePersonagemEdit" type="text" maxlength="26" required>
					</div>
					
					<div class="card-body">
					    <b class="font_20">Descrição</b>
					</div>
					<div class="card-text centralizar_inputs">
						<textarea class="form-control borda_nome_preto" id="descricaoPersonagemEdit" rows="4" name="descricaoPersonagemEdit" maxlength="105" required>{{$personagemDescricao}}</textarea>
					</div>

				<div class="card-body">
					<b class="font_20">Insira imagem</b>
                </div>
                <div>
                <img id="image_preview_container" class="imagem_troca_avatar" src="/uploads/personagens/{{$personagemImagem}}" alt="preview image">
                </div>
                <div class="upload-btn-wrapper layout_arrumar_tabela">
                        <button type="submit" class="btn_upload">Escolha uma foto
                            <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 512 512'><title>Escolha uma foto</title><path d='M320,367.79h76c55,0,100-29.21,100-83.6s-53-81.47-96-83.6c-8.89-85.06-71-136.8-144-136.8-69,0-113.44,45.79-128,91.2-60,5.7-112,43.88-112,106.4s54,106.4,120,106.4h56' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='320 255.79 256 191.79 192 255.79' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='256' y1='448.21' x2='256' y2='207.79' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                        </button>
                                <input         
                                type="file"
                                name="imagemPersonagemEdit"
                                id="imagemPersonagemEdit"
                                aria-label="Mudança de foto de personagem">
                </div>
                
                    <div class="card-body layout_arrumar_titulo">
                        <b class="font_20">Selecione o tipo</b>
                    </div>
                        <div class="form-group tamanho_inputs_select_edicao">
                            @if($personagemTipo == 1)
                            <select class="form-control borda_nome_preto" id="tipoPersonagemEdit" name="tipoPersonagemEdit" required>
                                <option value="1" selected>Geral</option>
                                <option value="2">Narrador</option>
                               </select>
                            @else
                            <select class="form-control borda_nome_preto" id="tipoPersonagemEdit" name="tipoPersonagemEdit" required>
                                <option value="1">Geral</option>
                                <option value="2" selected>Narrador</option>
                               </select>
                            @endif
                        </div>
                    <div>
                        <div>
                        <a href="{{ route('professor.personagens', $personagemIdSessao) }}" class="btn btn-outline-dark">Voltar</a>
                        <button class="btn btn-outline-dark" type="submit">Alterar</button>
                        </div>
					</div>
                </form>
                    </div>
            </div>
          </div>

    <script>
        $(document).ready(function (e) {
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
            });
           
            $('#imagemPersonagemEdit').change(function(){
                    
             let reader = new FileReader();
         
             reader.onload = (e) => { 
         
               $('#image_preview_container').attr('src', e.target.result); 
             }
         
             reader.readAsDataURL(this.files[0]); 
           
            });   
  });
        </script>
@endsection
