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
            <div class="table-responsive">
        		<table  class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Titulo</th>
                            <th>Tipo</th>
                            <th>CEP</th>
                            <th>Cidade</th>
                            <th>Bairro</th>
                            <th>Estado</th>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Complemento</th>
                            <th>Preço</th>
                            <th>Aluguel</th>
                            <th>Temporada</th>
                            <th>Área</th>
                            <th>Dormitórios</th>
                            <th>Suítes</th>
                            <th>Banheiros</th>
                            <th>Salas</th>
                            <th>Garagens</th>
                            <th>Descrição</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($imoveis as $imovel)
                        <tr>
                            <td>{{ $imovel->codigo_imovel }}</a></td>
                            <td>{{ $imovel->titulo_imovel }}</td>
                            <td>{{ $imovel->tipo_imovel }}</td>
                            <td>{{ $imovel->cep }}</td>
                            <td>{{ $imovel->cidade }}</td>
                            <td>{{ $imovel->bairro }}</td>
                            <td>{{ $imovel->estado }}</td>
                            <td>{{ $imovel->rua }}</td>
                            <td>{{ $imovel->numero }}</td>
                            <td>{{ $imovel->complemento }}</td>
                            <td>{{ $imovel->valor_venda }}</td>
                            <td>{{ $imovel->valor_locacao }}</td>
                            <td>{{ $imovel->valor_temporada }}</td>
                            <td>{{ $imovel->area }}</td>
                            <td>{{ $imovel->qt_dormitorios }}</td>
                            <td>{{ $imovel->qt_suites }}</td>
                            <td>{{ $imovel->qt_banheiros }}</td>
                            <td>{{ $imovel->qt_salas }}</td>
                            <td>{{ $imovel->qt_garagem }}</td>
                            <td>{{ $imovel->descricao }}</td>
                            <td><a href="{{ route('imovel.edit', ['id' => $imovel->id]) }}" class="btn btn-warning">Editar</a></td>
                            <td>
                            <form action="{{ route('imovel.destroy', ['id' => $imovel->id]) }}" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" name="name" value="Apagar">
                            </form>
                            </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            {!! $imoveis->links() !!}
    	</div>
    </div>
@stop