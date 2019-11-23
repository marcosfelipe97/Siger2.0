@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Devoluções de equipamentos</h1>
@stop


@section('scripts')

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
            <a class="active" href="{{ route('devolucao.create')}}">Registrar devolução</a>
   <a href="de-pdf">Gerar relatório </a>
     <div class="search-container">
     <form action="{{url('/devolucao/busca')}}" method="post">
      
     {{ csrf_field() }}
      <input type="date" placeholder="Buscar.." name="pesquisar" value="{{old('pesquisar')}}">
       <button type="submit"><i class="fa fa-search"></i></button>
     </form>
   </div>
 </div>
    </div>
</div>



</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
  
    
   <div class="container">
        {!! $devolucao->render() !!}
    </div>
    
    <thead>
        <tr>

          <td><b>Recebido por:</b></td>
          <td><b>Solicitado por:</b></td>
          <td><b>Equipamentos/Marca/No. de série:</b></td>
          <td><b>Hora da devolução:</b></td>
          <td><b>Data da reserva:<b></td>
          <td><b>Data da devolução:</b></td>
          <td><b>Observações:</b>




        </tr>
    </thead>
    <tbody>

        @foreach($devolucao as $devolucoes)
        <tr>



	          <td>{{$devolucoes->user->name}}</td>
            <td>{{$devolucoes->reservas->user->name}}</td>
            <td>{{$devolucoes->reservas->equipamentos->descricao}} /{{$devolucoes->reservas->equipamentos->marca}} / {{$devolucoes->reservas->equipamentos->numero_serie}}</td>
            <td>{{$devolucoes->hora}}</td>
            <td>{{ date( 'd/m/Y' , strtotime($devolucoes->reservas->dt_agendamento))}}</td>
            <td>{{ date( 'd/m/Y' , strtotime($devolucoes->data))}}</td>
            <td>{{$devolucoes->obs}}</td>


            

          

        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@stop
