@extends('layouts.app-professor')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-1">
            <form method="POST" action="{{ route('fotoProfessor.update', ['id' => Auth::guard('professor')->user()->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
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
                        <b>Imagem de perfil</b>
                    </div>

                    <div class="card-body">

                    <img class="imagem_troca_avatar" src="/uploads/avatars/{{ Auth::guard('professor')->user()->avatar }}" alt="imagem de perfil atual">

                    <div class="card-text espacamento_imagem">
                        <div class="upload-btn-wrapper">
                            <button type="submit" class="btn_upload">Escolha uma foto
                                <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 512 512'><title>Escolha um avatar</title><path d='M320,367.79h76c55,0,100-29.21,100-83.6s-53-81.47-96-83.6c-8.89-85.06-71-136.8-144-136.8-69,0-113.44,45.79-128,91.2-60,5.7-112,43.88-112,106.4s54,106.4,120,106.4h56' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><polyline points='320 255.79 256 191.79 192 255.79' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='256' y1='448.21' x2='256' y2='207.79' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                            </button>
                                    <input         
                                    type="file"
                                    name="avatar"
                                    id="avatar"
                                    aria-label="Mudança de foto de perfil"
                                    onchange="this.form.submit()"
                                    required>
                        </div>
                    </div>

                    @error('avatar')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
