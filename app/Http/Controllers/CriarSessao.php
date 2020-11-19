<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sessao;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CriarSessao extends Controller
{
    public function criarSessao(Request $request, Sessao $sessao){

        $quantidadeDeAlunos = $request->input('quantidadeDeAlunos');
        $pausa = $request->input('pausa');
        $idProfessorAtual = $request->input('idProfessorAtual');
        $nomeSessao = $request->input('nomeSessao');
        $dataSessao = $request->input('dataSessao');
        $codigo = $request->input('codigo');

        $dataDeHoje = date('Y-m-d');
        if($dataSessao <= $dataDeHoje){
            return redirect()->back()->with('error','Você não pode escolher uma data anterior ou igual a de hoje.');
        }

        try {
            $sessao = Sessao::where('codigoDeAcesso', '=', $codigo)->firstOrFail();
        }
        catch(ModelNotFoundException $e)
        {
            $sessao = new Sessao;
            $sessao->nome = $nomeSessao;
            $sessao->codigoDeAcesso = $codigo;
            $sessao->dataDeEncerramento = $dataSessao;
            $sessao->pausa = $pausa;
            $sessao->idProfessorSessao = $idProfessorAtual;
            $sessao->quantidadeDeAlunos = $quantidadeDeAlunos;
            $sessao->save();

            return redirect(route('professor.dashboard'))->with('success','A sessão foi criada!');
        }

            return redirect()->back()->with('error','Já existe uma sessão com esse código de acesso, tente outro.'); 
        
    }

    public function acessarCriacao(){
        return view('professor.criarSessao');
    }
}
