@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Reservas de Equipamentos</h1>
@stop

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

.topnav input[type=date] {
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
    <a class="active" href="{{ route('reservas.create')}}">Nova Reserva</a>
    <a href="{{ url('re-pdf')}}?search={{$search}}">Gerar relatório </a>
     <div class="search-container">
     <form action="{{url('/reservas/busca')}}" method="post">
      
     {{ csrf_field() }}
      <input type="date" name="search">
       <button type="submit"><i class="fa fa-search"></i></button>
     </form>
   </div>
 </div>
    </div>
</div>



<div>

  <table class="table table-striped">
  
  <div class="container">
        {!! $reservas->render() !!}
    </div>
    
   
    <thead>
        <tr>
          
          <td align="justify"><b>Solicitante:</b></td>
          <td align="center"><b>Horário de agendamento:</b></td>
          <td align="center"><b>Data de agendamento:</b></td>    
          <td align="center"><b>Equipamento/ Marca/ Modelo:</b></td>
          
         
	       
	   
          <td colspan="2"><b>Ações</b></td>
        </tr>
    </thead>
    <tbody>

        @foreach($reservas as $reservas)
        <tr>
      
            
                  
            <td align="justify">{{$reservas->user->name}}</td>
            <td align="justify">{{$reservas->horario->descricao}}</td>
            
            <td align="center">{{ date( 'd/m/Y' , strtotime($reservas->dt_agendamento))}}</td>
            <td align="center">{{$reservas->equipamentos->descricao}} / {{$reservas->equipamentos->marca}}  / {{$reservas->equipamentos->modelo}} </td>
                             
            <td>
                <form action="{{ route('reservas.destroy', $reservas->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar a reserva?')" type="submit">Cancelar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>


@stop
