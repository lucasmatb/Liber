@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header display_flex_card_header_aluno">
      <div class="col-8 display_flex_card_nome margem_esquerda_responsivo">
        <div>
          <b class="font_18">Bem vindo</b>
        </div>
        <div class="espacamento_nome">
          <b class="font_18">{{ Auth::guard()->user()->name }}</b>
        </div>
      </div>
      <div class="col-4 smartphonebotao">
        <a href="javascript:void(0)" class="btn btn-text" id="create-new-acesso">{{ __('Acessar sessão') }}</a>
      </div>
    </div>

    <div class="card-body">
      <div class="alinhar_texto suas-sessoes">
        <b style="font-size: 16px;">Suas sessões</b>
      </div>
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

      <div>
        @forelse ($sessoesAcessadas as $sessaoA)
          <div class="smartfoneSessoes">
            <div class="card text-center tamanho-cada-sessao" style="float: left; margin: 0 20px 20px 0;">
              <div class="card-header">
                <b>Nome da sessão: </b>{{ $sessaoA->nome }}
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Código de acesso: </b>{{ $sessaoA->codigoDeAcesso }}</li>
                <li class="list-group-item"><b>Data de encerramento: </b>{{ date('d/m/yy', strtotime($sessaoA->dataDeEncerramento)) }}</li>
                <div class="display_flex_li">
                  <a href="{{ route('apagar.exibicao.sessao', $sessaoA->id) }}" class="btn btn-text">
                    <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 512 512'><title>Excluir sessão</title><line x1='368' y1='368' x2='144' y2='144' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='368' y1='144' x2='144' y2='368' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                  </a>
                  <a href="{{ route('sessao.acessar.tabela', $sessaoA->codigoDeAcesso) }}" class="btn btn-text">
                    <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 512 512'><title>Entrar na sessão</title><path d='M176,176V136a40,40,0,0,1,40-40H424a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H216a40,40,0,0,1-40-40V336' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='272 336 352 256 272 176' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='48' y1='256' x2='336' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                  </a>
                </div>
              </ul>
            </div>
          </div>
        @empty
        <div style="text-align: center;">
          <b>Você não tem nenhuma sessão ativa. Tente acessar uma!</b>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</div>
  {!! $sessoesAcessadas->links() !!}
  
  <div class="modal fade" id="ajax-acesso-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="acessoModal"></h4>
          </div>
          <form action="{{ route('sessao.acessar.modal') }}" method="POST" id="acessoForm" name="acessoForm" class="form-horizontal">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <b for="codigoDeAcesso" class="col-sm-2 control-label">Insira o codigo de acesso</b>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="codigoDeAcesso" name="codigoDeAcesso" placeholder="Escreva o código" required>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" value="acesso">
                  Acessar
                </button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      /*  When user click add user button */
      $('#create-new-acesso').click(function () {
          $('#acessoModal').html("Acessar sessão");
          $('#ajax-acesso-modal').modal('show');
      });
    });
    </script>
@endsection