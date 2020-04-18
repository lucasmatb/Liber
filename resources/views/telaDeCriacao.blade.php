@extends('layouts.app-professor')

  @section('content')
  <title>{{ config('app.name', 'Liber') }}</title>
 
  
    <form>
    <form class="container-fluid">
    <h1 style="text-align: center;" class = "display-2 md-6 p-3 mt-5 mr-5 ml-5 p-3  ml-5">Criação de Sessão</h1>
    <br>
    
   
    
          <div class="form-row">
          <div class="form-group col-md-5 w-25 md-6 ml-5">
          <label>Nome da Sessão:</label>
          <input type="text" class="form-control">
          </div>
          <div class="form-group col-md-2 ml-5">
          <label>Imagem da Sessão: </label>
          <form class="md-form">
            <div class="form-group">
             <input type="file" id="fupload" name="fupload" class="fupload form-control  p-1 ">
          </div>
              
            </div>
          </form>
          </div>
          </div>
     

     <h2 style="text-align: left;"class = "display-3 md-6 p-3 mt-5 mr-5 ml-5 p-3  ml-5">Criação de Personagens:</h2>
     <br>

    
        <div class="form-row">
        <div class="form-group col-md-5 w-25 md-6 ml-5">
        <label>Nome do Personagem:</label>
        <input type="text" class="form-control">
        <br>
        <label>Imagem do Personagem: </label>
        <div class="form-group">
          <input type="file" id="upload" name="fupload" class="fupload form-control  p-1 ">
       </div>
        <br>
        <p><input type="radio" name="radio"> Personagem exclusivo</p>
        <p><input type="radio" name="radio"> Narrador</p>
        </div>
        <div class= "col-md-5 ml-5"data-spy="scroll">
        <label>Descrição do Personagem: </label>
        <div class="overflow-auto"><textarea class= "form-control input-lg"  rows="4"></textarea></div>
        </div>
        </div> 
   

    <div class="ml-5">
        <button type="reset" class="btn btn-dark">Limpar</button>
        <button type="submit"class="btn btn-dark ml-2">Adicionar</button>
    </div>
    </form>

    <form class="container-fluid">
        <h2 style="text-align: left;"class = "display-3 md-6 p-3 mt-5 mr-5 ml-5 p-3  ml-5">Lista de Personagens:</h2>  
        <ul class="list-group list-group-horizonta-x1 overflow-auto col-md-6">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Morbi leo risus</li>
          <li class="list-group-item">Porta ac consectetur ac</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
            <div class="col-md-5"><label class="ml-5">Seu código de acesso para convidados:</label></div>
           <div class="col-md-5 ml-5"><input class="form-control input-lg"></div>
            
        </div>    
    </form>
  </form>
 </body>
</html>
      
 
      <script src="node_modules/jquery/dist/jquery.js"></script>
      <script src="node_modules/popper.js/dist/umd/popper.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
      @endsection
     

