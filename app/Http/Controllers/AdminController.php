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

        $professor = Professor::select('id', 'name', 'email')->where('unconfirmed', 1)->latest()->paginate(10);

        return view('admin',compact('professor'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
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

        $professorDeletado = Professor::select('id', 'name', 'email')->where('unconfirmed', 10)->latest()->paginate(10);

        return view('adminDeletado',compact('professorDeletado'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function updateDeletado(Request $request, Professor $professor)
    {
        if($request->has('Aceitar') == true){
            $professor = $request->id;
            $update = DB::update('update professores set unconfirmed = 5 where id = ?', [$professor]);
            return redirect()->route('admin.index.deletado');
        }
        if($request->has('Deleto') == true){
            $professor = $request->id;
            $update = DB::delete('delete from professores where id = ?', [$professor]);
            return redirect()->route('admin.index.deletado');
        }
        if($request->has('Deleta') == true){
            $update = DB::delete('delete from professores where unconfirmed = 10');
            return redirect()->route('admin.index.deletado');
        }
    }
}
