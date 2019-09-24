@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   
<style>
  .uper {
    margin-top: 40px;
  }
</style>


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
