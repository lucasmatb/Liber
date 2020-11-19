@extends('layouts.app-professor')

@section('content')
<div class="container-fluid">
<div class="card">
  <div class="card-header row">

    <div class="col-6" style="padding-top: 0.3rem;">
    <b style="font-size: 18px;">Alunos conectados</b>
    </div>

    <div class="col-6 smartphonebotao2">
      <form action="{{ route('professor.alunos.bloqueio', $idSessaoDaora) }}" method="POST">
        @csrf
          @if($idBloqueado == 0)
          <button name='bloquear' value='bloquear' class="btn btn-text">{{ __('Bloquear novos acessos') }}</button>
          @else
          <button name='desbloquear' value='desbloquear' class="btn btn-text">{{ __('Desbloquear novos acessos') }}</button>
          @endif
      </form>
    </div>

</div>

  <div class="card-body">
    <div style="margin-bottom: 10px;">
      <b style="font-size: 16px;"></b>
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
      @forelse ($alunos as $alunosA)
      <div class="smartfoneSessoes">
          <div class="card text-center tamanho-cada-sessao" style="float: left; margin: 0 20px 20px 0;">
                <div class="card-header">
                  <b>Nome: </b>{{ $alunosA->name }} {{ $alunosA->sobrenome }}
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>E-mail: </b>{{ $alunosA->email }}</li>
                  <li class="list-group-item">
                  <img src="/uploads/avatars/{{ $alunosA->avatar }}" style="width:150px; height:150px; border-radius:50%">
                  </li>
                  <form action="{{ route('aluno.banir', $alunosA->id)  }}" method="GET">
                  <button name='banir' value='banir' style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-outline-dark">Banir</button>
                  <button name='reabilitar' value='reabilitar' style="margin-bottom: 10px; margin-top: 10px;" class="btn btn-outline-dark">Reabilitar</button>
                </form>
                </ul>
          </div>
        </div>
            @empty
            <div style="text-align: center;">
              <b>Nenhum aluno acessou essa sessão ainda!</b>
            </div>
      @endforelse

</div>
</div>
</div>
{!! $alunos->links() !!}
@endsection