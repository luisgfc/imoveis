@extends('adminlte::page')

@section('content_header')
    <h1>Imóveis</h1>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
            <div class="row">
                <div class="col-md-10">
                    <form action="{{ route('imovel.search') }}" method="post" class="form form-inline">
                        {{ csrf_field() }}
                        <input type="text" name="codigo" class="form-control" placeholder="Código">
                        <button type="submit" class="btn btn-primary">Pequisar</button>
                    </form>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('imovel.create') }}" class="btn btn-primary">Cadastrar Imóvel</a>
                </div>
            </div>
    	</div>
    	<div class="box-body">
    		<table  class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Titulo</th>
                        <th>Tipo</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imoveis as $imovel)
                    <tr>
                        <td>{{ $imovel->codigo_imovel }}</a></td>
                        <td>{{ $imovel->titulo_imovel }}</td>
                        <td>{{ $imovel->tipo_imovel }}</td>
                        <td>{{ $imovel->cidade }}</td>
                        <td>{{ $imovel->estado }}</td>
                        <td><a href="{{route('imovel.edit', $imovel->id )}}" class="btn btn-warning">Editar</a></td>
                        <td>
                        <form action="{{route( 'imovel.destroy', $imovel->id) }}" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" name="name" value="Apagar">
                        </form>
                        </td>
                    <tr>
                    @endforeach
                </tbody>
            </table>
            {!! $imoveis->links() !!}
    	</div>
    </div>
@stop