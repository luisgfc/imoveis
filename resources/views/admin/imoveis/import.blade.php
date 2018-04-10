@extends('adminlte::page')

@section('content_header')
    <h1>Importar Imóveis</h1>
@stop

@section('content')
    <div class="box">
    	<div class="box-body">
    		<form class="" action="{{route('imovel.import')}}" method="POST">
                {{ csrf_field() }}
    			<label for="url">Url:</label>
    			<input type="text" name="url" id="url" placeholder="Digite a url de importação:" style="width: 500px;" required>
    			<input type="submit" class="btn btn-success" name="name" value="Importar">
    		</form>
        </div>
    </div>
@stop