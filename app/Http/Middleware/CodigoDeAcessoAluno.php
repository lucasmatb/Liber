<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Sessao;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use App\Aluno;
use App\User;

use Closure;

class CodigoDeAcessoAluno
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $parametro = $request->route()->parameters();
        $idAlunoLogado = Auth::guard()->id();
        $buscarSessao = Sessao::where('codigoDeAcesso', '=', $parametro);
        $sessoesDoCodigo = $buscarSessao->value('id');
        $sessaoAtiva = $buscarSessao->value('pausa');
        $bloquearNovosAcessos = $buscarSessao->value('bloqueado');
        $dataDeEncerramento = $buscarSessao->value('dataDeEncerramento');
        $dataDeHoje = date('Y-m-d');

        $banido = Aluno::where('idAluno', '=', $idAlunoLogado)->where('idSessao', '=', $sessoesDoCodigo)->value('banido');
        
        try {
            $tabelasDoAlunoLogado = Aluno::where('idAluno', '=', $idAlunoLogado)->where('idSessao', '=', $sessoesDoCodigo)->firstOrFail();
        }
        catch(ModelNotFoundException $e){
            if($bloquearNovosAcessos == 1){
                return redirect()->back()->with("error",'Essa sessão bloqueou novos acessos.');
            }
            return redirect()->back()->with("error",'Você deve apenas tentar acessar uma sessão pelo botão "Acessar sessão"!');
        }

        if($sessaoAtiva == 1){
            return redirect()->back()->with("error",'Essa sessão não está ativa, entre em contato com o professor.');
        }

        if($banido == 1){
            return redirect()->back()->with("error",'Você foi banido desta sessão.');
        }

        if($dataDeEncerramento < $dataDeHoje){
            return redirect()->back()->with("error",'Não é possível acessar, data de encerramento alcançada.');
        }
        return $next($request);

    }
}
