@extends('layouts.app-professor')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-1">
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
            <form method="POST" action="{{ route('teladecriacao.update') }}">
			@csrf
			<input type="hidden" value="0" name="quantidadeDeAlunos" id="quantidadeDeAlunos">
			<input type="hidden" value="0" name="pausa" id="pausa">
			<input type="hidden" id="idProfessorAtual" name="idProfessorAtual" value="{{ Auth::guard('professor')->user()->id }}">
				
                <div class="card text-center">

                    <div class="card-header">
                        <b style="font-size: 20px;">Criação de sessão</b>
                    </div>

                    <div class="card-body">

					<div class="card-body">
						<b style="font-size: 16px;">Nome da sessão</b>
					</div>
                    <div class="card-text">
						<input type="text" id="nomeSessao" name="nomeSessao" style="width:80%;" maxlength="30"  required>
					</div>
					
					<div class="card-body">
					<b style="font-size: 16px;">Data do encerramento</b>
					</div>
					<div class="card-text">
						<input type="date" name="dataSessao" id="dataSessao" required>
					</div>

					<div class="card-body">
					<b style="font-size: 16px;">Código único para acesso</b>
					</div>
					<div class="card-text">
						<input type="text" id="codigo" name="codigo" style="width:50%;" maxlength="80" required>
					</div>

					<div class="card-body">
                    <div class="card-text" style="margin-top: 15px;">
						<button type="submit" class="btn btn-outline-dark">Criar Sessão</button>
					</div>
					</div>

                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>

@endsection