<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => 'user'], function () {
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home/fotoDePerfil/{id}', 'Auth\PerfilUserController@showTrocaDeFoto')->name('foto.aluno');

    Route::patch('/home/fotoDePerfil/{id}', 'Auth\PerfilUserController@updateFoto')->name('fotoAluno.update');

    Route::get('/home/trocaDeSenha/{id}', 'Auth\PerfilUserController@showTrocaDeSenha')->name('trocaDeSenha.aluno');

    Route::post('/home/trocaDeSenha/{id}', 'Auth\PerfilUserController@updateSenha')->name('trocaDeSenhaAluno.update');

    Route::group(['middleware' => 'codigoDeAcessoAluno'], function () {
    Route::get('/home/sessao/{codigoDeAcesso}', 'HomeController@acessarTabela')->name('sessao.acessar.tabela');
    });

    Route::get('/home/exclusao/{id}', 'HomeController@apagarExibicao')->name('apagar.exibicao.sessao');

    Route::post('/home', 'HomeController@acessar')->name('sessao.acessar.modal');

});

Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::get('/admin/deletado', 'AdminController@indexDeletado')->name('admin.index.deletado');

    Route::get('/admin/deletartodos', 'AdminController@deletarTodos')->name('admin.deletar.todos');

    Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('admin/{id}', 'AdminController@update')->name('admin.update');
    Route::get('admin/deletado/{id}', 'AdminController@updateDeletado')->name('admin.update.deletado');

    Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('admin/logout', 'Auth\AdminLoginController@protectLogout')->name('protectAdmin.logout');
});

Route::group(['middleware' => 'professor'], function () {

    Route::get('/professor', 'ProfessorController@index')->name('professor.dashboard');

    Route::get('/professor/trocarData/{id}', 'ProfessorController@acessoTrocaData')->name('professor.acessoTrocaData');
    Route::post('/professor/trocarData/{id}', 'ProfessorController@trocaData')->name('professor.trocaData');

    Route::get('/professor/personagens/{id}', 'ProfessorController@acessarPersonagens')->name('professor.personagens');
    Route::post('/professor/personagens/{id}', 'ProfessorController@storePersonagem')->name('professor.personagens.store');

    Route::get('/professor/personagem/edicao/{id}', 'ProfessorController@acessoPersonagemEdicao')->name('personagem.tela.edicao');
    Route::post('/professor/personagem/edicao/{id}', 'ProfessorController@personagemEdicao')->name('personagem.edicao');

    Route::get('/professor/personagem/excluir/{id}', 'ProfessorController@excluirPersonagem')->name('personagem.excluir');

    Route::group(['middleware' => 'professorAluno'], function () {
    Route::get('/professor/alunos/{id}', 'ProfessorController@alunosIndex')->name('professor.alunos');
    Route::post('/professor/alunos/{id}', 'ProfessorController@alunosBloqueio')->name('professor.alunos.bloqueio');
    
});

    Route::get('/professor/aluno/{id}', 'ProfessorController@banir')->name('aluno.banir');
    Route::get('/professor/update/{id}', 'ProfessorController@update')->name('sessao.update');

    Route::group(['middleware' => 'codigoDeAcessoProfessor'], function () {
    Route::get('/professor/sessao/{codigoDeAcesso}', 'ProfessorController@acessarChatProfessor')->name('sessao.acesso.professor');
    Route::post('/professor/sessao/{codigoDeAcesso}', 'ProfessorController@salvarMensagemProfessor')->name('sessao.mensagem');
    });
    
    Route::get('/professor/excluir/postagem/{id}', 'ProfessorController@excluirPostagemProfessor')->name('sessao.apagar.postagem.professor');
    Route::get('/professor/excluir/resposta/{id}', 'ProfessorController@excluirRespostaPostagemProfessor')->name('sessao.apagar.resposta.professor');
    Route::get('/professor/postagem/{id}', 'ProfessorController@acessarPostagem')->name('sessao.postagem');
    Route::post('/professor/postagem/{id}', 'ProfessorController@responderPostagemProfessor')->name('sessao.resposta.postagem');

    Route::get('/professor/login', 'Auth\ProfessorLoginController@showLoginForm')->name('professor.login');

    Route::post('/professor/login', 'Auth\ProfessorLoginController@login')->name('professor.login.submit');

    Route::get('/professor/criacao', 'CriarSessao@acessarCriacao')->name('teladecriacao');
    Route::post('/professor/criacao', 'CriarSessao@criarSessao')->name('teladecriacao.update');
    
    Route::post('/professor/logout', 'Auth\ProfessorLoginController@logout')->name('professor.logout');

    Route::get('/professor/logout', 'Auth\ProfessorLoginController@protectLogout')->name('protectProfessor.logout');

    Route::get('/professor/fotoDePerfil/{id}', 'Auth\PerfilProfessorController@showTrocaDeFoto')->name('foto.professor');

    Route::patch('/professor/fotoDePerfil/{id}', 'Auth\PerfilProfessorController@updateFoto')->name('fotoProfessor.update');

    Route::get('/professor/trocaDeSenha/{id}', 'Auth\PerfilProfessorController@showTrocaDeSenha')->name('trocaDeSenha.professor');

    Route::post('/professor/trocaDeSenha/{id}', 'Auth\PerfilProfessorController@updateSenha')->name('trocaDeSenhaProfessor.update');

    Route::get('/professor/password/reset', 'Auth\ForgotProfessorPasswordController@ShowLinkRequestForm')->name('professor.password.request');
    Route::post('/professor/password/email', 'Auth\ForgotProfessorPasswordController@SendResetLinkEmail')->name('professor.password.email');
    Route::get('/professor/password/reset/{token}', 'Auth\ResetProfessorPasswordController@ShowResetForm')->name('professor.password.reset');
    Route::post('/professor/password/reset', 'Auth\ResetProfessorPasswordController@Reset')->name('professor.password.update');
});

Route::get('/professor/register', 'Auth\ProfessorRegisterController@showProfessorRegisterForm')->name('professor.register');
Route::post('/professor/register', 'Auth\ProfessorRegisterController@register');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@protectLogout')->name('protect.logout');

