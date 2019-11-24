@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Equipamentos</h1>
@stop
<style>
  .uper {
    margin-top: 40px;
  }

  * {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>


@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
      <div class="topnav">
          <a class="active" href='javascript:create.submit()'>Incluir</a>
        <a  href="{{ route('equipamentos.index')}}">Voltar</a>
       <div class="search-container">
       
       </div>
       </div>
  </div>
  <form name='create' method="post" action="{{ route('equipamentos.store') }}">
          <div class="form-group">
              @csrf
              <label for="descricao">Nome do Equipamento:</label>
              <input type="text" class="form-control" name="descricao" value=" {{old('descricao')}}" autofocus />
            </div>
            <div class="form-group">
            <label for="etiqueta">Etiqueta:</label>
              <input type="text" class="form-control" name="etiqueta" value="{{old('etiqueta')}}" autofocus />
            </div>
	  <div class="form-group">
 		<label for="marca">Marca do equipamento:</label>
        	<input type="text" class="form-control" name="marca" autofocus value="{{old('marca')}}"/>
	  </div>

     <div class="form-group">
 		<label for="modelo">Modelo do equipamento:</label>
        	<input type="text" class="form-control" name="modelo" autofocus value="{{old('modelo')}}"/>
	  </div>

     

	 <div class="form-group">
 		<label for="numero_serie">Número de série do equipamento:</label>
        	<input type="text" class="form-control" name="numero_serie" autofocus value="{{old('numero_serie')}}"/>
	  </div>
		 <div class="form-group">
			<label for="dt_aquisicao">Data de aquisição do equipamento:</label>
			{!!
				Form::date('dt_aquisicao',\Carbon\Carbon::now(),['class' => 'form-control']);

                        !!}		
	
        
          
      </form>
  </div>
</div>

@stop
