@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Lista de Usuários</h1>
@stop

@section('content')
   
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

<div class="card uper">
    <div class="card-header">
        
      
      
      
      <div class="topnav">
            
   
     <div class="search-container">
     <form action="{{url('/user/busca')}}" method="post">
      
     {{ csrf_field() }}
      <input type="text" placeholder="Buscar.." name="pesquisar" value="{{old('pesquisar')}}">
       <button type="submit"><i class="fa fa-search"></i></button>
     </form>
   </div>
 </div>
    </div>
</div>



  <table class="table table-striped">
 
    
    
    

   
    <thead>
        <tr>
        
         <td> <b>Nome:</b></td>
         <td> <b>Matricula:</b></td>
         <td> <b>Telefone:</b></td>
         <td> <b>E-mail:</b></td>         
        
         <td colspan="2"><b>Ações</b></td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($user as $users)
        <tr>
            
	     <td> {{$users->name}}</td>
       <td> {{$users->matricula}}</td>
       <td> {{$users->telefone}}</td>
       <td> {{$users->email}}</td>

      
            <td>
                <form action="{{ route('user.destroy', $users->id)}}" method="post" onclick="return confirm('Tem certeza que deseja excluir o usuário?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
     

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

<div>


@stop
