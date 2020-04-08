<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">
  <link rel = "stylesheet"  href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css"  integridade = "SHA384-ggOyR0iXCbMQv3Xipma34MD + DH / 1fQ784 / j6cY / iJTQUOhcWr7x9JvoRxT2MZw1T"  crossorigin = "anônimo" >
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <title>Liber</title>
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="floating-labels.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  

  
    
    <style>
    #perfilImg{
        display: none;
    } 
  
    </style>
   
</head>
<body> 
 
  @extends('layouts.app ')

  @section('content')
 
  <title>{{ config('app.name', 'Liber') }}</title>
  
    <form class="overflow-auto">
    <form>
    <div class="form-group">
    <h1 style=" text-align: left; color: black" class="ml-5 mt-5">Bem vindo, Professor!</h1>

    <div style="text-align: right;" >
    <button type="button"class="btn btn-light mr-5 btn-lg"> <a href="{{ route('teladecriacao') }}">Criar Sessão</a></button>
    <button type="button"class="btn btn-light mr-5 btn-lg"> <a href="#" class="card-link" data-toggle="modal" data-target="#perfilModal">Meu Perfil</a></button>
    <button type="button"class="btn btn-light mr-5 btn-lg"> <a href="#">Participar Sessão</a></button>
    </div>
    </div> 
    </form>

    <div class="w3-bar  w3-black mt-2 mb-3">
       <div class="w3-bar-item w3-left"> Sessões Criadas:</div>
    </div>

    <form class="form-group">
        <ul class="list-group w-50 p-3 mh-50">
            <li class="list-group-item">Nome da Sessão: </li>
            <li class="list-group-item">Criador: </li>
            <li class="list-group-item">Visitantes: </li>
            <li class="list-group-item">Postagens: </li>
            <li class="list-group-item">Personagens: </li>
            <li class="list-group-item">Personagens exclusivos: </li>
            <li class="list-group-item">Encerramento da sessão: </li>
        </ul>

    <form class="container">
        <div>
          <button class="btn btn-classic " type="button">
          <a href="#" class="card-link" data-toggle="modal" data-target="#encerrarModal">
          <svg class="bi bi-power ml-5 mb-1"  width="5em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd"/>
          <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd"/>
          </svg>
        </a>   
    </button>   
    
    <button type="button" class="btn btn-classic ">  
            <a href="#alterarDataModal" class="card-link" data-toggle="modal" data-target="#alterarDataModal">
            <svg class="bi bi-clock-history" width="4em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
            </svg>
            </a>           
           </button>


        <button class="btn btn-classic " type="button">  
          <a href="#" class="card-link" data-toggle="modal" data-target="#excluirModal">
            <svg class="bi bi-x-circle" width="4em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
              </svg>
          </a>
        </button>
        </div>
    </form>
   </form>      
            
    <div class="w3-bar  w3-black mt-2 mb-3">
        <div class="w3-bar-item w3-left"> Sessões Visitadas:</div>
     </div>

     <form class="form-group">
        <div class="form-row">
        <div class="form-group col-md-6">
        <ul class="list-group w-100 p-3 mh-50">
          <li class="list-group-item">Nome da Sessão: </li>
          <li class="list-group-item">Criador: </li>
          <li class="list-group-item">Suas Postagens: </li>
          <li class="list-group-item">Personagens: </li>
          <li class="list-group-item">Encerramento da sessão: </li>
            <button class="btn btn-classic " type="submit">  
              <a href="#" class="card-link" data-toggle="modal" data-target="#excluirModal"><svg class="bi bi-x-circle" width="4em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                  </svg>
              </a>
        </ul>
     </div>

        <div class="form-group col-md-6" >
        <ul class="list-group w-100 p-3 mh-50 ">
            <li class="list-group-item">Nome da Sessão: </li>
            <li class="list-group-item">Criador: </li>
            <li class="list-group-item">Suas Postagens: </li>
            <li class="list-group-item">Personagens Usados: </li>
            <li class="list-group-item">Encerramento da sessão: </li>
            <button class="btn btn-classic " type="submit">  
              <a href="#" class="card-link" data-toggle="modal" data-target="#excluirModal"><svg class="bi bi-x-circle" width="4em" height="10em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                  </svg>
                </a>
         </ul>
        </div>
        </div>
   </form>
</form>

    <!--MODAIS-->

    <div class="modal" id="perfilModal" tabindex="-1" role="dialog" width="50px">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Seu Perfil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div style=text-align:center; class="modal-body">
              <p>Insira uma imagem: </p>
              <label for="perfilImg" class="custom-file-upload" id="perfilTela">
                  <input id="perfilImg" type="file">
                  <svg class=" bi bi-person-square" width="15em" height="8em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                </svg>
              </label>
              <hr>
              <form>
                  <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label mb-1">Nome: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control mt-2 col-md-6" id="inputTexto" placeholder="Nome">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEscola" class="col-sm-2 col-form-label mb-3">Escola: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control mt-2 col-md-6" id="inputEscola" placeholder="Escola">
                    </div>
                    <label for="inputEmail" class="col-sm-2 col-form-label mb-1">Email: </label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control mt-2 col-md-6" id="inputEmail" placeholder="Email">
                    </div>  
                  </div>
                </form>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="mb-1 btn btn-primary">Salvar Mudanças</button>
          </div>
        </div>
      </div>
    </div>
  
    <div class="modal" tabindex="-1" role="dialog" id="encerrarModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Encerrar sessão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Deseja encerrar essa sessão agora ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            <button type="button" class="btn btn-primary">Encerrar</button>
          </div>
        </div>
      </div>
    </div>
  
    <div class="modal" id="alterarDataModal" tabindex="-1" role="dialog" width="50px">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Alterar Data de Encerramento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div style=text-align:center; class="modal-body">
              <p style="text align:center;">Data de encerramento: </p>
              <div class="container">
                <div class="col-sm-6" style="height:130px;">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker9'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker9').datetimepicker({
                            viewMode: 'years'
                        });
                    });
                </script>
            </div>
            
               <hr>
                              
          <div style="text-align: center" class="modal-footer">
            <button type="button" class="btn btn-secondary close" data-dismiss="modal" aria-label="Close">Voltar</button>
            <button type="button" class="mb-1 btn btn-primary">Encerrar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal " tabindex="-1" role="dialog" id="excluirModal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Excluir sessão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Deseja excluir essa sessão agora ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            <button type="button" class="btn btn-primary">Excluir</button>
          </div>
        </div>
      </div>
    </div>

 </body>
</html>


<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

@endsection
