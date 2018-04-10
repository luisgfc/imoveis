@extends('adminlte::page')

@section('content_header')
    <h1>Imóveis</h1>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		Cadastrar Imóvel
    	</div>
    	<div class="box-body">
    		<form class="" action="{{route('imovel.store')}}" enctype="multipart/form-data" method="POST">
    			<div class="row">
    				<div class="col-md-6">
    					{{ csrf_field() }}

    					<div class="form-group">
    						<label for="titulo_imovel">Título do imóvel:</label>
    						<textarea class="form-control" name="titulo_imovel" id="titulo_imovel" required></textarea>
    					</div>

    					<div class="form-group">
    						<label for="codigo_imovel">Código do imóvel:</label>
    						<input type="text" class="form-control" name="codigo_imovel" placeholder="Digite o código do imóvel" required>
    					</div>

    					<div class="form-group">
    						<label for="tipo_imovel">Selecione o tipo do imóvel:</label>
    						<select class="form-control" name="tipo_imovel" required>
    							<option value="" disabled selected hidden></option>
    							<option>Casa</option>
    							<option>Apartamento</option>
    						</select>
    					</div>

    					<div class="form-group">
    						<label for="cep">CEP:</label>
    						<input type="text" class="form-control" name="cep" id="cep" placeholder="Digite o cep do imóvel" required>
    					</div>

    					<div class="form-group">
    						<label for="rua">Rua:</label>
    						<input type="text" class="form-control" name="rua" id="rua">
    					</div>

    					<div class="form-group">
    						<label for="cidade">Cidade:</label>
    						<input type="text" class="form-control" name="cidade" id="cidade">
    					</div>

    					<div class="form-group">
    						<label for="bairro">Bairro:</label>
    						<input type="text" class="form-control" name="bairro" id="bairro">
    					</div>

    					<div class="form-group">
    						<label for="estado">Estado:</label>
    						<input type="text" class="form-control" name="estado" id="estado">
    					</div>

    					<div class="form-group">
    						<label for="numero">Número:</label>
    						<input type="text" class="form-control" name="numero" id="numero">
    					</div>

    					<div class="form-group">
    						<label for="complemento">Complemento:</label>
    						<input type="text" class="form-control" name="complemento" id="complemento">
    					</div>
    				</div>

    				<div class="col-md-6">

    					<div class="form-group">
    						<label for="valor_venda">Preço do imóvel:</label>
    						<input type="text" class="form-control" name="valor_venda" id="valor_venda" placeholder="Exemplo: 0000.00" required>
    					</div>

    					<div class="form-group">
    						<label for="valor_locacao">Valor do aluguel:</label>
    						<input type="text" class="form-control" name="valor_locacao" id="valor_locacao" placeholder="Exemplo: 0000.00" required>
    					</div>

    					<div class="form-group">
    						<label for="valor_temporada">Preço de temporada:</label>
    						<input type="text" class="form-control" name="valor_temporada" id="valor_temporada" placeholder="Exemplo: 0000.00" required>
    					</div>

    					<div class="form-group">
    						<label for="area">Área:</label>
    						<input type="text" class="form-control" name="area" id="area" placeholder="Exemplo: 0000.00" required>
    					</div>

    					<div class="form-group">
    						<label for="qt_dormitorios">Quantidade de dormitórios:</label>
    						<input type="number" class="form-control" min="0" name="qt_dormitorios" required>
    					</div>

    					<div class="form-group">
    						<label for="qt_suites">Quantidade de suítes:</label>
    						<input type="number" class="form-control" min="0" name="qt_suites" required>
    					</div>

    					<div class="form-group">
    						<label for="qt_banheiros">Quantidade de banheiros:</label>
    						<input type="number" class="form-control" min="0" name="qt_banheiros" required>
    					</div>

    					<div class="form-group">
    						<label for="qt_salas">Quantidade de salas:</label>
    						<input type="number" class="form-control" min="0" name="qt_salas" required>
    					</div>

    					<div class="form-group">
    						<label for="qt_garagem">Quantidade de garagens:</label>
    						<input type="number" class="form-control" min="0" name="qt_garagem" required>
    					</div>

    					<div class="form-group">
    						<label for="descricao">Descrição do imóvel:</label>
    						<textarea class="form-control" name="descricao" id="descricao" required></textarea>
    					</div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="form-group" align="center">
    					<label for="imagem">Imagem do imóvel:</label>
    					<input type='file' id="imagem" class="form-control-file" name="imagem" accept="image/*" />
    				</div>
    			</div>
    			<div class="row">
    				<div class="form-group" align="center">
    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
    					<input type="submit" class="btn btn-success" name="name" value="Cadastrar">
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
@stop



@section('js')
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
                $("#complemento").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");
                        $("#complemento").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#complemento").val(dados.complemento);
                                $("#rua").focus();
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
@stop