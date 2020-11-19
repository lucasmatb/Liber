<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Sessao;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;
use App\Professor;

use Closure;

class professorAluno
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
            $sessao = Sessao::where('idProfessorSessao', '=', $idProfessorLogado)->where('id', '=', $parametro)->firstOrFail();
        }
        catch(ModelNotFoundException $e)
        {
            return redirect()->back()->with("error","Você só pode visualizar alunos de sessões criadas por você.");
        }

        return $next($request);
    }
}
