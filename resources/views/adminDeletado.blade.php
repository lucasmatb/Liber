@extends('layouts.app-admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Professores Deletados</h2>
                <a href="{{ route('admin.index')}}">Verificação</a>
            </div>
        </div>
    </div>
   
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Ação</th>
        </tr>
        @foreach ($professorDeletado as $professorI)
        <tr>
            <td>{{ $professorI->name }}</td>
            <td>{{ $professorI->email }}</td>
            <td>
                <form action="{{ route('admin.update.deletado', $professorI->id) }}" method="GET">
                    <button type='submit' name='Aceitar' value='Aceitar' class="btn btn-sucess">Aceitar</button>
                    <button type='submit' name='Deleto' value='Deleto' class="btn btn-sucess">Deletar</button>
                    <button type='submit' name='Deleta' value='Deleta' class="btn btn-sucess">Deletar todos</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $professorDeletado->links() !!}
      
@endsection