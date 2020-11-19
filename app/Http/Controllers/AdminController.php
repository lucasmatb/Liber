<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Professor;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $professor = Professor::select('id', 'name',  'sobrenome', 'email')->where('unconfirmed', 1)->latest()->paginate();

        return view('admin.admin',compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        if($request->has('Aceitar') == true){
            $professor = $request->id;
            $update = DB::update('update professores set unconfirmed = 5 where id = ?', [$professor]);
            return redirect()->route('admin.index');

        }
        if($request->has('Delete') == true){
            $professor = $request->id;
            $update = DB::update('update professores set unconfirmed = 10 where id = ?', [$professor]);
            return redirect()->route('admin.index');
        }

    }

    public function indexDeletado() {

        $professorDeletado = Professor::select('id', 'name', 'sobrenome', 'email')->where('unconfirmed', 10)->latest()->paginate();

        return view('admin.adminDeletado',compact('professorDeletado'));
    }

    public function updateDeletado(Request $request, Professor $professor)
    {
        if($request->has('Aceitar') == true){
            $professor = $request->id;
            $update = DB::update('update professores set unconfirmed = 5 where id = ?', [$professor]);
            return redirect()->route('admin.index.deletado');
        }
        if($request->has('Delete') == true){
            $professor = $request->id;
            $update = DB::delete('delete from professores where id = ?', [$professor]);
            return redirect()->route('admin.index.deletado');
        }
    }
    public function deletarTodos(Request $request, Professor $professor)
    {        
        if($request->has('Deleta') == true){
        Professor::where('unconfirmed', '=', 10)->delete();
        return redirect()->back()->with('success','Todos os professores foram excluídos.');
        }
            
    }
}
