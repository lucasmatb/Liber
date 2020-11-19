<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Sessao;
use App\Resposta;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Personagem;
use App\Postagem;
use App\Aluno;
use Image;
use Validator;
use Carbon\Carbon;
use Carbon\Factory;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:professor');
    }

    public function index()
    {
        //pegar id do professor logado
        $idProfessorHTML = Auth::guard('professor')->id(); 
        $sessao = Sessao::select('id', 'nome', 'codigoDeAcesso', 'dataDeEncerramento', 'pausa', 'idProfessorSessao', 'quantidadeDeAlunos')->where('idProfessorSessao', '=', $idProfessorHTML)->latest()->paginate();
        return view('professor.professor', compact('sessao'));
        
    }

    public function acessarPersonagens(Request $request){

        $parametro = $request->route()->parameters();

        $personagens = Personagem::select('id', 'nome', 'idSessao', 'descricaoPersonagem', 'imagemPersonagem', 'tipoPersonagem')->where('idSessao', '=', $parametro)->latest()->paginate();

        return view('professor.personagens', compact('parametro', 'personagens'));
    }

    public function storePersonagem(Request $request, Personagem $personagem, $id)
    {

        $validator = Validator::make($request->all(), [
            'imagemPersonagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nomePersonagem' => 'required|max:26',
            'descricaoPersonagem' => 'required|max:105',
            'tipoPersonagem' => 'required',
          ]);

        if ($validator->passes()) {

            $imagemPersonagem = $request->file('imagemPersonagem');
            $filename = time() . '.' . $imagemPersonagem->getClientOriginalExtension();
        
            Image::make($imagemPersonagem)->resize(300, 300)->save('uploads/personagens/' . $filename);

            
            $personagem = new Personagem;
            $personagem->nome = $request->input('nomePersonagem');
            $personagem->idSessao = $id;
            $personagem->descricaoPersonagem = $request->input('descricaoPersonagem');
            $personagem->imagemPersonagem = $filename;
            $personagem->tipoPersonagem = $request->input('tipoPersonagem');
            $personagem->save();
        
        return redirect()->back()->with("success","Personagem criado com sucesso!");
        
        }
        return redirect()->back()->with("error","Erro, somente arquivos jpg, jpeg, png ou gif.");

    }

    public function excluirPersonagem($id){
        $personagemSelecionado = Personagem::where('id', '=', $id);
        $personagemImagem = $personagemSelecionado->value('imagemPersonagem');
        //saber se o personagem tem alguma postagem, se ele tiver, não apagar a imagem dele da pasta pois não apareceria no postagem depois
        try {
            Postagem::where('idPersonagem', '=', $id)->firstOrFail();
        }
        catch(ModelNotFoundException $e){
            $file = 'uploads/personagens/' . $personagemImagem;
            if(file_exists($file)){
                unlink($file);
            }
        }

        Personagem::where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function acessoPersonagemEdicao($id){
        $personagem = Personagem::select('id', 'nome', 'idSessao', 'descricaoPersonagem', 'imagemPersonagem', 'tipoPersonagem')->where('id', '=', $id);
        $personagemNome = $personagem->value('nome');
        $personagemIdSessao = $personagem->value('idSessao');
        $personagemDescricao = $personagem->value('descricaoPersonagem');
        $personagemImagem = $personagem->value('imagemPersonagem');
        $personagemTipo = $personagem->value('tipoPersonagem');
        return view('professor.personagem-edicao', compact('id', 'personagemNome','personagemIdSessao', 'personagemDescricao', 'personagemImagem', 'personagemTipo'));
    }

    public function personagemEdicao(Request $request, Personagem $personagem, $id){

        $personagemIdSessao = Personagem::where('id', '=', $id)->value('idSessao');
        $personagemImagemAntiga = Personagem::where('id', '=', $id)->value('imagemPersonagem');

        if($request->has('imagemPersonagemEdit')){

        $validator = Validator::make($request->all(), [
            'imagemPersonagemEdit' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nomePersonagemEdit' => 'required|max:26',
            'descricaoPersonagemEdit' => 'required|max:105',
            'tipoPersonagemEdit' => 'required',
          ]);

        if ($validator->passes()) {

            $imagemPersonagemEdit = $request->file('imagemPersonagemEdit');
            $filename = time() . '.' . $imagemPersonagemEdit->getClientOriginalExtension();
            $file = 'uploads/personagens/' . $personagemImagemAntiga;
            unlink($file);
            Image::make($imagemPersonagemEdit)->resize(300, 300)->save('uploads/personagens/' . $filename);
            
            $personagem = Personagem::where('id', '=', $id)->update([
                'nome' => $request->input('nomePersonagemEdit'),
                'descricaoPersonagem' => $request->input('descricaoPersonagemEdit'),
                'imagemPersonagem' => $filename,
                'tipoPersonagem' => $request->input('tipoPersonagemEdit'),
            ]);
        
        return redirect(route('professor.personagens', $personagemIdSessao))->with("success","Personagem editado com sucesso!");
        
        }
        return redirect()->back()->with("error","Erro, somente arquivos jpg, jpeg, png ou gif.");
    }

    $personagem = Personagem::where('id', '=', $id)->update([
        'nome' => $request->input('nomePersonagemEdit'),
        'descricaoPersonagem' => $request->input('descricaoPersonagemEdit'),
        'tipoPersonagem' => $request->input('tipoPersonagemEdit'),
    ]);

    return redirect(route('professor.personagens', $personagemIdSessao))->with("success","Personagem editado com sucesso!");
    }

    public function update(Request $request, Sessao $sessao)
    {
        if($request->has('pausar') == true){
            $sessaoId = $request->id;
            $sessao = Sessao::where('id', '=', $sessaoId)->update(['pausa' => '1']);
            return redirect()->back()->with('success','A sessão foi pausada.');
        }

        if($request->has('ativar') == true){
            $sessaoId = $request->id;
            $sessao = Sessao::where('id', '=', $sessaoId)->update(['pausa' => '0']);
            return redirect()->back()->with('success','A sessão foi ativada.');
        }

        if($request->has('deletar') == true){
            $idSessao = $request->id;
            $codigoDaSessao = Sessao::where('id', '=', $idSessao)->value('codigoDeAcesso');
            //deletando todos as tabelas aluno
            Aluno::where('idSessao', '=', $idSessao)->delete();

            /*//deletando todas as imagens das postagens da pasta do laravel
            $imagensPostagens = Postagem::where('codigoSessao', '=', $codigoDaSessao)->get('avatarPersonagem');
            foreach($imagensPostagens as $c){
            $file = 'uploads/personagens/' . $c->avatarPersonagem;
            unlink($file);
            }*/

            /*//deletando todas as imagens dos personagens da pasta do laravel
            $imagensPersonagens = Personagem::where('idSessao', '=', $idSessao)->get('imagemPersonagem');
            foreach($imagensPersonagens as $x){
            $file = 'uploads/personagens/' . $x->imagemPersonagem;
            unlink($file);
            }*/

            //apaga todos os avatares dos personagens dessa sessão
            $imagensPersonagens = Personagem::where('idSessao', '=', $idSessao)->get('imagemPersonagem');
            foreach($imagensPersonagens as $x){
                $file = 'uploads/personagens/' . $x->imagemPersonagem;
                unlink($file);
            }
            //apaga todos os avatares de personagens que já foram excluídos na edição mas postaram algo
            $imagensPostagens = Postagem::where('codigoSessao', '=', $codigoDaSessao)->get('avatarPersonagem');
            foreach($imagensPostagens as $c){
                $file = 'uploads/personagens/' . $c->avatarPersonagem;
                if(file_exists($file)){
                    unlink($file);
                }
            }

        //apagando todas as imagens das postagens
        $postagemSelecionada = Postagem::where('codigoSessao', '=', $codigoDaSessao)->get('id');
        $postagemImagemSelecionada = Postagem::where('codigoSessao', '=', $codigoDaSessao)->get('imagem');
        foreach($postagemImagemSelecionada as $f){
            $filePostagem = 'uploads/postagens/' . $f->imagem;
            if(file_exists($filePostagem)){
                if(is_file($filePostagem)){
                    unlink($filePostagem);
                }
            }
        }

        //apagando todas as imagens das respostas
        foreach($postagemSelecionada as $z){
            $respostaSelecionada = Resposta::where('idPostagem', '=', $z->id)->get('imagem');
            foreach($respostaSelecionada as $y){
                $fileRespostaPostagem = 'uploads/postagens/' . $y->imagem;
                if(file_exists($fileRespostaPostagem)){
                    if(is_file($fileRespostaPostagem)){
                        unlink($fileRespostaPostagem);
                    }
                }
            }
        }
       
            //deletando todas as tabelas personagem
            Personagem::where('idSessao', '=', $idSessao)->delete();
            //deletando todas as postagens
            $sessaoCodigoDeAcesso = Sessao::where('id', '=', $idSessao)->value('codigoDeAcesso');
            Postagem::where('codigoSessao', '=', $sessaoCodigoDeAcesso)->delete();
            //apagando a sessao
            $update = DB::delete('delete from sessao where id = ?', [$idSessao]);
            return redirect()->route('professor.dashboard')->with('success','A sessão foi apagada');
        }
    } 

    public function alunosIndex(Request $request){
        $parametro = $request->route()->parameters();

        $idBloqueado = Sessao::where('id', '=', $parametro)->value('bloqueado');

        $colecao = array();
        
        $todasQuerysAlunos = Aluno::where('idSessao', '=', $parametro)->get();

        $idSessaoDaora = Sessao::where('id', '=', $parametro)->value('id');

        foreach ($todasQuerysAlunos as $f) {
            array_push($colecao, $f->idAluno);

        }

        $alunos = User::select('id', 'name', 'sobrenome', 'avatar', 'email')
        ->whereIn('id', $colecao)
        ->latest()->paginate();  

        return view('professor.alunos', compact('alunos', 'idSessaoDaora', 'idBloqueado'));
    }

    public function banir(Request $request, Aluno $aluno)
    {
        if($request->has('banir') == true){
            $aluno = $request->id;
            $validacao = Aluno::where('idAluno', '=', $aluno)->value('banido');
            if($validacao == 1){
                return redirect()->back()->with('error','Este aluno já foi banido.');
            }
            $alunoget = Aluno::where('idAluno', '=', $aluno)->update(['banido' => '1']);
            return redirect()->back()->with('success','O aluno foi banido.');
        }
        if($request->has('reabilitar') == true){
            $aluno = $request->id;
            $validacao = Aluno::where('idAluno', '=', $aluno)->value('banido');
            if($validacao == 0){
                return redirect()->back()->with('error','Este aluno não está banido.');
            }
            $alunoget = Aluno::where('idAluno', '=', $aluno)->update(['banido' => '0']);
            return redirect()->back()->with('success','O aluno foi reabilitado.');
        }
    }

    public function alunosBloqueio(Request $request){
        
        if($request->has('bloquear') == true){
            $parametro = $request->route()->parameters();
            $idSessaoDaora = Sessao::where('id', '=', $parametro)->update(['bloqueado' => '1']);
            return redirect()->back()->with('success','A sessão foi bloqueada.');
        }
        if($request->has('desbloquear') == true){
            $parametro = $request->route()->parameters();
            $idSessaoDaora = Sessao::where('id', '=', $parametro)->update(['bloqueado' => '0']);
            return redirect()->back()->with('success','A sessão foi desbloqueada.');
        }

    }

    public function acessoTrocaData($id){
        $dataTroca = Sessao::where('id', '=', $id)->value('dataDeEncerramento');

        return view('professor.trocaData', compact('id', 'dataTroca'));
    }

    public function trocaData(Request $request, Sessao $sessao){
        $parametro = $request->route()->parameters();
        $novaData = $request->input('trocarData');
        $dataDeHoje = date('Y-m-d');
        if($novaData < $dataDeHoje){
            return redirect()->back()->with('error','Você não pode escolher uma data anterior ou igual a de hoje.');
        }

        $sessao = Sessao::where('id', '=', $parametro)->update(['dataDeEncerramento' => $novaData]);
        return redirect('/professor')->with('success','A data foi trocada com sucesso.');
        
    }

    public function acessarChatProfessor($codigoDeAcesso){
        $brasilCarbon = new Factory([
            'locale' => 'pt_BR',
            'timezone' => 'America/Sao_Paulo',
        ]);
        $idDaSessao = Sessao::where('codigoDeAcesso', '=', $codigoDeAcesso)->value('id');
        $nomeDaSessao = Sessao::where('codigoDeAcesso', '=', $codigoDeAcesso)->value('nome');
        $listaPersonagens = Personagem::select('id', 'nome', 'idSessao', 'descricaoPersonagem', 'imagemPersonagem', 'tipoPersonagem')->where('idSessao', '=', $idDaSessao)->where('tipoPersonagem', '=', 2)->latest()->paginate();
        $timeline = Postagem::select('id', 'nomeAluno', 'sobrenomeAluno', 'avatarAluno', 'nomePersonagem', 'avatarPersonagem', 'nomeProfessor', 'sobrenomeProfessor','avatarProfessor', 'mensagem', 'imagem', 'codigoSessao', 'created_at')->where('codigoSessao', '=', $codigoDeAcesso)->paginate();
        return view('professor.chatProfessor', compact('listaPersonagens', 'timeline', 'codigoDeAcesso', 'brasilCarbon', 'nomeDaSessao'));
    }

    public function salvarMensagemProfessor(Request $request, $codigoDeAcesso){

        $idProfessorLogado = Auth::user()->id;
        $selecionarProfessor = Professor::select('name', 'sobrenome', 'avatar')->where('id', '=', $idProfessorLogado);
        $nomeProfessorSelecionado = $selecionarProfessor->value('name');
        $sobrenomeProfessorSelecionado = $selecionarProfessor->value('sobrenome');
        $avatarProfessorSelecionado = $selecionarProfessor->value('avatar');

        $idPersonagemSelecionado = $request->input('escolhaPersonagem');
        $selecionarPersonagem = Personagem::select('nome', 'imagemPersonagem')->where('id', '=', $idPersonagemSelecionado);
        $nomePersonagemSelecionado = $selecionarPersonagem->value('nome');
        $avatarPersonagemSelecionado = $selecionarPersonagem->value('imagemPersonagem');

        if($request->hasFile('imagem_chat_professor')){
            
        $validator = Validator::make($request->all(), [
            'imagem_chat_professor' => 'required|image|mimes:jpeg,png,jpg,gif|max:3000',
          ]);

          if ($validator->passes()) {

            $imagem = $request->file('imagem_chat_professor');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
        
            Image::make($imagem)->save('uploads/postagens/' . $filename);

            $postagem = new Postagem;
            $postagem->idPersonagem = $idPersonagemSelecionado;
            $postagem->nomePersonagem = $nomePersonagemSelecionado;
            $postagem->avatarPersonagem = $avatarPersonagemSelecionado;
            $postagem->nomeProfessor = $nomeProfessorSelecionado;
            $postagem->sobrenomeProfessor = $sobrenomeProfessorSelecionado;
            $postagem->avatarProfessor = $avatarProfessorSelecionado;
            $postagem->imagem = $filename;
            $postagem->mensagem = $request->input('mensagemPostagem');
            $postagem->codigoSessao = $codigoDeAcesso;
            $postagem->save();
        
            return redirect()->back();
        }

          return redirect()->back()->with("error","Erro, somente arquivos jpg, jpeg, png ou gif até 3mb.");

        }

        if($request->has('mensagemPostagem')){
            
            $validator = Validator::make($request->all(), [
                'mensagemPostagem' => 'required|min:1',
              ]);
    
              if ($validator->passes()) {
    
                $postagem = new Postagem;
                $postagem->idPersonagem = $idPersonagemSelecionado;
                $postagem->nomePersonagem = $nomePersonagemSelecionado;
                $postagem->avatarPersonagem = $avatarPersonagemSelecionado;
                $postagem->nomeProfessor = $nomeProfessorSelecionado;
                $postagem->sobrenomeProfessor = $sobrenomeProfessorSelecionado;
                $postagem->avatarProfessor = $avatarProfessorSelecionado;
                $postagem->mensagem = $request->input('mensagemPostagem');
                $postagem->codigoSessao = $codigoDeAcesso;
                $postagem->save();
            
                return redirect()->back();
            }
    
            return redirect()->back();
    
            }

    }

    public function excluirPostagemProfessor($id){

        $postagemSelecionada = Postagem::where('id', '=', $id);
        $postagemImagem = $postagemSelecionada->value('imagem');
        $codigoDeAcesso = $postagemSelecionada->value('codigoSessao');

        $respostas = Resposta::where('idPostagem', '=', $id)->get('imagem');
        
        $filePostagem = 'uploads/postagens/' . $postagemImagem;
            if(file_exists($filePostagem)){
                if(is_file($filePostagem)){
                    unlink($filePostagem);
                }
        }

        foreach($respostas as $a){
            $file = 'uploads/postagens/' . $a->imagem;
            if(file_exists($file)){
                if(is_file($file)){
                    unlink($file);
                }
            }
        }

        Resposta::where('idPostagem', '=', $id)->delete();
        Postagem::where('id', '=', $id)->delete();

        return redirect()->route('sessao.acesso.professor', $codigoDeAcesso);

    }

    public function excluirRespostaPostagemProfessor($id){

        $resposta = Resposta::where('id', '=', $id);
        $imagemResposta = $resposta->value('imagem');
        $idPostagem = $resposta->value('idPostagem');

        $fileResposta = 'uploads/postagens/' . $imagemResposta;
            if(file_exists($fileResposta)){
                if(is_file($fileResposta)){
                    unlink($fileResposta);
                }
        }

        Resposta::where('id', '=', $id)->delete();

        return redirect()->route('sessao.postagem', $idPostagem);

    }
    
    public function responderPostagemProfessor(Request $request, $id){

        $idProfessorLogado = Auth::user()->id;
        $selecionarProfessor = Professor::select('name', 'sobrenome', 'avatar')->where('id', '=', $idProfessorLogado);
        $nomeProfessorSelecionado = $selecionarProfessor->value('name');
        $sobrenomeProfessorSelecionado = $selecionarProfessor->value('sobrenome');
        $avatarProfessorSelecionado = $selecionarProfessor->value('avatar');

        $idPersonagemSelecionado = $request->input('escolhaPersonagem_modal');
        $selecionarPersonagem = Personagem::select('nome', 'imagemPersonagem')->where('id', '=', $idPersonagemSelecionado);
        $nomePersonagemSelecionado = $selecionarPersonagem->value('nome');
        $avatarPersonagemSelecionado = $selecionarPersonagem->value('imagemPersonagem');

        if($request->hasFile('imagem_chat_professor_modal')){
            
        $validator = Validator::make($request->all(), [
            'imagem_chat_professor_modal' => 'required|image|mimes:jpeg,png,jpg,gif|max:3000',
          ]);

          if ($validator->passes()) {

            $imagem = $request->file('imagem_chat_professor_modal');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
        
            Image::make($imagem)->save('uploads/postagens/' . $filename);

            $resposta = new Resposta;
            $resposta->idPostagem = $id;
            $resposta->idPersonagem = $idPersonagemSelecionado;
            $resposta->nomePersonagem = $nomePersonagemSelecionado;
            $resposta->avatarPersonagem = $avatarPersonagemSelecionado;
            $resposta->nomeProfessor = $nomeProfessorSelecionado;
            $resposta->sobrenomeProfessor = $sobrenomeProfessorSelecionado;
            $resposta->avatarProfessor = $avatarProfessorSelecionado;
            $resposta->imagem = $filename;
            $resposta->mensagem = $request->input('mensagemPostagem_modal');
            $resposta->save();
        
            return redirect()->route('sessao.postagem', $id);
        }

          return redirect()->back()->with("error","Erro, somente arquivos jpg, jpeg, png ou gif até 3mb.");

        }

        if($request->has('mensagemPostagem_modal')){
            
            $validator = Validator::make($request->all(), [
                'mensagemPostagem_modal' => 'required|min:1',
              ]);
    
              if ($validator->passes()) {
    
                $resposta = new Resposta;
                $resposta->idPostagem = $id;
                $resposta->idPersonagem = $idPersonagemSelecionado;
                $resposta->nomePersonagem = $nomePersonagemSelecionado;
                $resposta->avatarPersonagem = $avatarPersonagemSelecionado;
                $resposta->nomeProfessor = $nomeProfessorSelecionado;
                $resposta->sobrenomeProfessor = $sobrenomeProfessorSelecionado;
                $resposta->avatarProfessor = $avatarProfessorSelecionado;
                $resposta->mensagem = $request->input('mensagemPostagem_modal');
                $resposta->save();
            
                return redirect()->route('sessao.postagem', $id);
            }
    
            return redirect()->back();
    
            }

    }

    public function acessarPostagem($id){

        $postagem = Postagem::select()->where('id', '=', $id);
        $brasilCarbon = new Factory([
            'locale' => 'pt_BR',
            'timezone' => 'America/Sao_Paulo',
        ]);
        $dataPostagem = $postagem->value('created_at');
        $postagemDataCarbon = $brasilCarbon->make($dataPostagem)->isoFormat('lll');

        $sessao = Sessao::select()->where('codigoDeAcesso', '=', $postagem->value('codigoSessao'));

        $listaPersonagens = Personagem::select('id', 'nome', 'idSessao', 'descricaoPersonagem', 'imagemPersonagem', 'tipoPersonagem')->where('idSessao', '=', $sessao->value('id'))->where('tipoPersonagem', '=', 2)->latest()->paginate();

        $respostas = Resposta::select('id', 'idPostagem', 'nomeAluno', 'sobrenomeAluno', 'avatarAluno', 'nomePersonagem', 'avatarPersonagem', 'nomeProfessor', 'sobrenomeProfessor','avatarProfessor', 'mensagem', 'imagem', 'created_at')->where('idPostagem', '=', $id)->paginate();

        return view('professor.chatProfessorResposta', compact('listaPersonagens', 'postagem', 'postagemDataCarbon', 'respostas', 'sessao'));

    }

}
