@extends('layouts.app-professor')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header display_flex_card_header_professor">
      <div class="col-8 display_flex_card_nome margem_esquerda_responsivo">
        <div>
          <b class="font_18">Bem vindo</b>
        </div>
        <div class="espacamento_nome">
          <b class="font_18">{{ Auth::guard('professor')->user()->name }}</b>
        </div>
      </div>
      <div class="col-4 smartphonebotao">
        <a class="btn btn-text" href="{{ route('teladecriacao') }}">{{ __('Criar sessão') }}</a>
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
    @forelse ($sessao as $sessaoI)
        <div class="smartfoneSessoes">
                <div class="card text-center tamanho-cada-sessao" style="float: left; margin: 0 20px 20px 0;">
                  <div class="card-header">
                    <b>Nome da sessão: </b>{{ $sessaoI->nome }}
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Código de acesso: </b>{{ $sessaoI->codigoDeAcesso }}</li>
                    <li class="list-group-item"><b>Data de encerramento: </b>{{ date('d/m/yy', strtotime($sessaoI->dataDeEncerramento)) }}</li>
                    
                    <li class="list-group-item"><b>Alunos que acessaram: </b>{{ $sessaoI->quantidadeDeAlunos }}
                      <a href="{{ route('professor.alunos', $sessaoI->id) }}" name='{{ $sessaoI->id }}' value='{{ $sessaoI->id }}' class="btn btn-text">
                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 512 512'><title>Lista de personagens</title><path d='M402,168c-2.93,40.67-33.1,72-66,72s-63.12-31.32-66-72c-3-42.31,26.37-72,66-72S405,126.46,402,168Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M336,304c-65.17,0-127.84,32.37-143.54,95.41-2.08,8.34,3.15,16.59,11.72,16.59H467.83c8.57,0,13.77-8.25,11.72-16.59C463.85,335.36,401.18,304,336,304Z' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px'/><path d='M200,185.94C197.66,218.42,173.28,244,147,244S96.3,218.43,94,185.94C91.61,152.15,115.34,128,147,128S202.39,152.77,200,185.94Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><path d='M206,306c-18.05-8.27-37.93-11.45-59-11.45-52,0-102.1,25.85-114.65,76.2C30.7,377.41,34.88,384,41.72,384H154' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
                      </a>
                    </li>
                    <div class="layout_top_bottom_sessao">
                      <form action="{{ route('sessao.update', $sessaoI->id) }}" method="GET">
                        @csrf
                      @if($sessaoI->pausa == 1)
                      <button name='ativar' value='ativar' class="btn btn-text">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 512 512'><title>Ativar</title><path d='M448,256c0-106-86-192-192-192S64,150,64,256s86,192,192,192S448,362,448,256Z' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px'/><path d='M216.32,334.44,330.77,265.3a10.89,10.89,0,0,0,0-18.6L216.32,177.56A10.78,10.78,0,0,0,200,186.87V325.13A10.78,10.78,0,0,0,216.32,334.44Z'/></svg>
                      </button>
                      @else
                      <button name='pausar' value='pausar' class="btn btn-text">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 512 512'><title>Pausar</title><path d='M448,256c0-106-86-192-192-192S64,150,64,256s86,192,192,192S448,362,448,256Z' style='fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:32px'/><line x1='208' y1='192' x2='208' y2='320' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><line x1='304' y1='192' x2='304' y2='320' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
                      </button>
                      @endif

                      <a data-toggle="modal" data-target="#abertura-sessao-{{ $sessaoI->id }}" class="btn btn-text">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 512 512'><title>Deletar</title><path d='M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='80' y1='112' x2='432' y2='112' style='stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='256' y1='176' x2='256' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='184' y1='176' x2='192' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='328' y1='176' x2='320' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                      </a>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="abertura-sessao-{{ $sessaoI->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Você tem certeza que deseja excluir a sessão {{$sessaoI->nome}}?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <button type="submit" name='deletar' value='deletar' class="btn btn-dark">Excluir</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    

                      <a href="{{ route('professor.acessoTrocaData', $sessaoI->id) }}" class="btn btn-text">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 512 512'><title>Calendário</title><rect x='48' y='80' width='416' height='384' rx='48' ry='48' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><path d='M397.82,80H114.18C77.69,80,48,110.15,48,147.2V208H64c0-16,16-32,32-32H416c16,0,32,16,32,32h16V147.2C464,110.15,434.31,80,397.82,80Z'/><circle cx='296' cy='232' r='24'/><circle cx='376' cy='232' r='24'/><circle cx='296' cy='312' r='24'/><circle cx='376' cy='312' r='24'/><circle cx='136' cy='312' r='24'/><circle cx='216' cy='312' r='24'/><circle cx='136' cy='392' r='24'/><circle cx='216' cy='392' r='24'/><circle cx='296' cy='392' r='24'/><line x1='128' y1='48' x2='128' y2='80' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='384' y1='48' x2='384' y2='80' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                      </a>
                      <a href="{{ route('sessao.acesso.professor', $sessaoI->codigoDeAcesso) }}" class="btn btn-text">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 512 512'><title>Acessar</title><path d='M176,176V136a40,40,0,0,1,40-40H424a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H216a40,40,0,0,1-40-40V336' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='272 336 352 256 272 176' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='48' y1='256' x2='336' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                      </a>
                    </form>
                    </div>
                      <li class="list-group-item">
                        <a href="{{ route('professor.personagens', $sessaoI->id) }}" class="btn btn-outline-dark">Adicionar personagens</a>
                      </li>
                  </ul>
                </div>
              </div>
              @empty
              <div style="text-align: center;">
                <b>Você não tem nenhuma sessão ativa. Tente criar uma!</b>
              </div>
              @endforelse
    </div>
  </div>
  </div>
</div>
{!! $sessao->links() !!}
@endsection