<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Admin;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:professor');
    }

    public function index()
    {
        return view('professor');
    }
}
