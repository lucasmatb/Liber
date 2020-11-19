@extends('layouts.app-admin')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header display_flex_card_header_admin">
      <div class="col-8 display_flex_card_nome_admin margem_esquerda_responsivo_admin">
        <div>
          <b class="font_18">Adminstrador</b>
        </div>
        <div class="espacamento_nome">
          <b class="font_18">{{ Auth::guard('admin')->user()->name }}</b>
        </div>
      </div>
      <div class="col-4 smartphonebotao">
        <a class="btn btn-text" href="{{ route('admin.index.deletado')}}">{{ __('Professores deletados') }}</a>
      </div>
    </div>
    <div class="card-body">
      <div class="alinhar_texto suas-sessoes">
        <b style="font-size: 16px;">Professores para validação</b>
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
        @forelse ($professor as $professorI)
          <div class="smartfoneSessoes">
            <div class="card text-center tamanho-cada-sessao" style="float: left; margin: 0 20px 20px 0;">
              <div class="card-header">
                <b>Nome: </b>{{ $professorI->name }} {{ $professorI->sobrenome }}
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>E-mail: </b>{{ $professorI->email }}</li>
                <form action="{{ route('admin.update', $professorI->id) }}" method="GET">
                    <button type='submit' name='Aceitar' value='Aceitar' class="btn btn-outline-dark" style="margin-bottom: 10px; margin-top: 10px;">Aceitar
                    </button>
                    <button type='submit' name='Delete' value='Delete' class="btn btn-outline-dark" style="margin-bottom: 10px; margin-top: 10px;">Deletar
                    </button>
                </form>
              </ul>
            </div>
          </div>
        @empty
          <div style="text-align: center;">
            <b>Nenhum professor requisitou acesso.</b>
          </div>
        @endforelse
    </div>
    {!! $professor->links() !!}
      
@endsection