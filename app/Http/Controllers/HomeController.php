<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sessao;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Aluno;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //pegar id do aluno logado
        $colecao = array();
        $idAlunoLogado = Auth::guard()->id();
        $todasQuerysAlunoLogado = Aluno::where('idAluno', '=', $idAlunoLogado)->where('exibicao', '=', 0)->get('idSessao');
        $todasSessoes = Sessao::get('id');

        foreach ($todasQuerysAlunoLogado as $f) {
            foreach($todasSessoes as $s){
                    if($f->idSessao == $s->id){
                        array_push($colecao, $s->id);
                    }
            }
        }

        $sessoesAcessadas = Sessao::select('id', 'nome', 'codigoDeAcesso', 'dataDeEncerramento', 'idProfessorSessao')
        ->whereIn('id', $colecao)
        ->latest()
        ->paginate();
        //$sessoesAcessadas
        return view('aluno.home', compact('sessoesAcessadas'));
        //return view('welcome');
    }

    public function acessar(Request $request, Sessao $sessao){

        $codigoDeAcesso = $request->input('codigoDeAcesso');
        try {
            $sessao = Sessao::where('codigoDeAcesso', '=', $codigoDeAcesso)->firstOrFail();
        }
        catch(ModelNotFoundException $e)
        {
            return redirect()->back()->with("error","O código de acesso informado está incorreto.");
        }

        $bloquearNovosAcessos = Sessao::where('codigoDeAcesso', '=', $codigoDeAcesso)->value('bloqueado');
        
        $idAluno = Auth::guard()->id();

        $idSessao =  DB::table('sessao')
        ->where('codigoDeAcesso', '=', $codigoDeAcesso)
        ->value('id');



        try {

            $modeloAluno = Aluno::where('idAluno', '=', $idAluno)->where('idSessao', '=', $idSessao)->firstOrFail();

        } catch(ModelNotFoundException $e){
            if($bloquearNovosAcessos == 1){
                return redirect()->back()->with("error",'Essa sessão bloqueou novos acessos.');
            }
            DB::table('alunos')->insert(
                ['idSessao' => $idSessao, 'idAluno' => $idAluno, 'banido' => 0],
        );
            DB::table('sessao')->where('id', $idSessao)->increment('quantidadeDeAlunos');
        } finally {
            Aluno::where('idAluno', '=', $idAluno)->where('idSessao', '=', $idSessao)->update(['exibicao' => '0']);
        }
        

        return redirect()->route('sessao.acessar.tabela', ['codigoDeAcesso' => $codigoDeAcesso]);
    }

    public function acessarTabela(){
        return view('aluno.chatAluno');

    }

    public function apagarExibicao(Request $request){

        $alunoLogado = Auth::guard()->id();
        $sessaoExcluida = $request->id;
        $alunoGet = Aluno::where('idAluno', '=', $alunoLogado)->where('idSessao', '=', $sessaoExcluida)->update(['exibicao' => '1']);

        return redirect()->back()->with('success','A sessão foi apagada.');
    }
}
