@extends('layouts.app-professor')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-1">
            <form method="POST" action="{{ route('professor.trocaData', $id) }}">
                @csrf
                
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="card text-center">

                    <div class="card-header">
                        <b>Trocar data</b>
                    </div>

                    <div class="card-body">
                    <div class="card-text">
                    <input class="border border-gray-400 p-2 w-full"
                               type="date"
                               name="trocarData"
                               id="trocarData"
                               value="{{$dataTroca}}"
                               required>
                    </div>
                    <div class="card-text" style="margin-top: 15px;">
                    <button type="submit" class="btn btn-outline-dark">Trocar</button>
                    </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
