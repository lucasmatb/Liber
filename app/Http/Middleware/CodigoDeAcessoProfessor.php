<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Sessao;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;

use Closure;

class CodigoDeAcessoProfessor
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
        $idProfessorLogado = Auth::guard('professor')->id();

        try {
            $sessao = Sessao::where('idProfessorSessao', '=', $idProfessorLogado)->where('codigoDeAcesso', '=', $parametro)->firstOrFail();
        }
        catch(ModelNotFoundException $e)
        {
            return redirect()->back()->with("error","Erro, ou este código não existe ou você não é o criador desta sessão.");
        }



        return $next($request);

    }
}
