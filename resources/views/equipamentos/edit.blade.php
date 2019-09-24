@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Equipamentos</h1>
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
</style>

<div class="card uper">
  <div class="card-header">
  
  </div>
  <div class="card-body">
        <form method="post" action="{{ route('equipamentos.update', $equipamentos->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="descricao">Nome do equipamento:</label>
          <input type="text" class="form-control" name="descricao" placeholder="{{$equipamentos->descricao}}" value="{{old('descricao')}}" />
       
        <div class="form-group">
          <label for="marca">Marca do equipamento:</label>
          <input type="text" class="form-control" name="marca" placeholder="{{ $equipamentos->marca}}" value="{{old('marca')}}"/>
        </div>
        <div class="form-group">
          <label for="modelo">Modelo do equipamento:</label>
          <input type="text" class="form-control" name="modelo" placeholder="{{ $equipamentos->modelo }}"  value="{{old('modelo')}}"/>
        </div>
        <div class="form-group">
          <label for="numero_serie">Número de série do equipamento:</label>
          <input type="text" class="form-control" name="numero_serie" placeholder="{{ $equipamentos->numero_serie }}" value="{{old('numero_serie')}}" />
        </div>
         <label for="dt_aquisicao">Data de aquisição do equipamento:</label>
			{!!
				Form::date('dt_aquisicao', \Carbon\Carbon::now(),['class' => 'form-control']);

                        !!}		
		</div>

        <div class="form-group">
        <input type="hidden" class="form-control" name="status" value="{{$equipamentos->status}}">
        </div>
        <div class='form-group'>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('equipamentos.index')}}" class="btn btn-primary">Voltar</a>
        </div>
      </form>
  </div>
</div>

@stop
