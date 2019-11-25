@extends('adminlte::page')


@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')
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
        <a class="active" href='javascript:create.submit()'>Alterar a Senha</a>
      <a  href="{{ url('\home')}}">Voltar</a>
      </div>

<div class="card uper">
  <div class="card-header">

  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form name="create" method="post" action="{{url('user/updatepassword')}}">
    {{csrf_field()}}
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" class="form-control"  value="{{auth()->user()->name}}" />
            </div>

            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" name="matricula" class="form-control" value="{{auth()->user()->matricula}}"/>
            </div>

           
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" />
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" class="form-control" value="{{auth()->user()->telefone}}" />
            </div>

            <div class="form-group">
                <label for="mypassword">Senha Atual:</label>
                <input type="password" name="mypassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Nova Senha:</label>
                <input type="password" name="password" class="form-control">
            </div>
                
            <div class="form-group">
                <label for="mypassword">Confirme a nova senha:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Alterar a senha</button>
</form>
@stop