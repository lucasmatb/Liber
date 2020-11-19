@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card text-center">
                <div class="card-header"><b>Troca de senha</b></div>
                </div>
                <div class="card-body">

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

                <form method="POST" action="{{ route('trocaDeSenhaAluno.update', ['id' => Auth::user()->id]) }}">
                        @csrf
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-8 col-form-label text-md-right">Senha atual</label>

                            <div class="col-md-12">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-8 col-form-label text-md-right">Nova senha</label>

                            <div class="col-md-12">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block mensagem-erro">
                                        <strong>A senha escrita no campo "Confirme sua nova senha" não confere com a do campo "Nova senha" ou vice-versa. Tente novamente.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-10 col-form-label text-md-right">Confirme sua nova senha</label>

                            <div class="col-md-12">
                                <input id="new-password-confirm" type="password" class="form-control " name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Trocar senha') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
