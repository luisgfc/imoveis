<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Imoveis;
use File;
use Illuminate\Support\Facades\Input;

class ImoveisController extends Controller
{

	public function index(){
		$imoveis = Imoveis::paginate();
		return view('admin.imoveis.index',compact('imoveis',$imoveis));
	}

    public function create(){
    	return view('admin.imoveis.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'titulo_imovel' => 'required',
            'codigo_imovel' => 'required',
            'tipo_imovel' => 'required',
            'cep' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'estado' => 'required',
            'numero' => 'required',
            'rua' => 'required',
            'complemento' => 'required',
            'valor_venda' => 'required',
            'valor_locacao' => 'required',
            'valor_temporada' => 'required',
            'area' => 'required',
            'qt_dormitorios' => 'required',
            'qt_suites' => 'required',
            'qt_banheiros' => 'required',
            'qt_salas' => 'required',
            'qt_garagem' => 'required',
            'descricao' => 'required',
        ]);
        
        $imoveis = new Imoveis;
        $imoveis->codigo_imovel = $request->codigo_imovel;
        $imoveis->tipo_imovel = $request->tipo_imovel;
        $imoveis->titulo_imovel = $request->titulo_imovel;
        $imoveis->cep = $request->cep;
        $imoveis->cidade = $request->cidade;
        $imoveis->bairro = $request->bairro;
        $imoveis->estado = $request->estado;
        $imoveis->numero = $request->numero;
        $imoveis->rua = $request->rua;
        $imoveis->complemento = $request->complemento;
        $imoveis->valor_venda = $request->valor_venda;
        $imoveis->valor_venda = str_replace(",", ".", $imoveis->valor_venda);
        $imoveis->valor_locacao = $request->valor_locacao;
        $imoveis->valor_locacao = str_replace(",", ".", $imoveis->valor_locacao);
        $imoveis->valor_temporada = $request->valor_temporada;
        $imoveis->valor_temporada = str_replace(",", ".", $imoveis->valor_temporada);
        $imoveis->area = $request->area;
        $imoveis->area = str_replace(",", ".", $imoveis->area);
        $imoveis->qt_dormitorios = $request->qt_dormitorios;
        $imoveis->qt_suites = $request->qt_suites;
        $imoveis->qt_banheiros = $request->qt_banheiros;
        $imoveis->qt_salas = $request->qt_salas;
        $imoveis->qt_garagem = $request->qt_garagem;
        $imoveis->descricao = $request->descricao;
        if(Input::file('imagem'))
        {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if($extensao != 'jpg' && $extensao != 'png')
            {
               return back()->with('erro','Erro: Este arquivo não é imagem');
            }
        }      
        $imoveis->save();
        if(Input::file('imagem'))
            {
                File::move($imagem,public_path().'/imagens/imovel-id_'.$imoveis->id.'.'.$extensao);
                $imoveis->imagens = '/imagens/imovel-id_'.$imoveis->id.'.'.$extensao;
                $imoveis->save();
            }
        
        return redirect('admin/imoveis');
    }

    public function edit($id)
    {
        $imoveis = Imoveis::find($id);
        if(!$imoveis){
            abort(404);
        }
        return view('admin.imoveis.edit')->with('detailpage', $imoveis);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo_imovel' => 'required',
            'codigo_imovel' => 'required',
            'tipo_imovel' => 'required',
            'cep' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'estado' => 'required',
            'numero' => 'required',
            'rua' => 'required',
            'complemento' => 'required',
            'valor_venda' => 'required',
            'valor_locacao' => 'required',
            'valor_temporada' => 'required',
            'area' => 'required',
            'qt_dormitorios' => 'required',
            'qt_suites' => 'required',
            'qt_banheiros' => 'required',
            'qt_salas' => 'required',
            'qt_garagem' => 'required',
            'descricao' => 'required',
        ]);
        
        $imoveis = Imoveis::find($id);
        $imoveis->codigo_imovel = $request->codigo_imovel;
        $imoveis->tipo_imovel = $request->tipo_imovel;
        $imoveis->titulo_imovel = $request->titulo_imovel;
        $imoveis->cep = $request->cep;
        $imoveis->cidade = $request->cidade;
        $imoveis->bairro = $request->bairro;
        $imoveis->estado = $request->estado;
        $imoveis->numero = $request->numero;
        $imoveis->rua = $request->rua;
        $imoveis->complemento = $request->complemento;
        $imoveis->valor_venda = $request->valor_venda;
        $imoveis->valor_venda = str_replace(",", ".", $imoveis->valor_venda);
        $imoveis->valor_locacao = $request->valor_locacao;
        $imoveis->valor_locacao = str_replace(",", ".", $imoveis->valor_locacao);
        $imoveis->valor_temporada = $request->valor_temporada;
        $imoveis->valor_temporada = str_replace(",", ".", $imoveis->valor_temporada);
        $imoveis->area = $request->area;
        $imoveis->area = str_replace(",", ".", $imoveis->area);
        $imoveis->qt_dormitorios = $request->qt_dormitorios;
        $imoveis->qt_suites = $request->qt_suites;
        $imoveis->qt_banheiros = $request->qt_banheiros;
        $imoveis->qt_salas = $request->qt_salas;
        $imoveis->qt_garagem = $request->qt_garagem;
        $imoveis->descricao = $request->descricao;
        if(Input::file('imagem'))
        {
            $imagem = Input::file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            if($extensao != 'jpg' && $extensao != 'png')
            {
               return back()->with('erro','Erro: Este arquivo não é imagem');
            }
        }
        $imoveis->update();
        if(Input::file('imagem'))
            {
                File::delete(public_path().$imoveis->imagem);
                File::move($imagem,public_path().'/imagens/imovel-id_'.$imoveis->id.'.'.$extensao);
                $imoveis->imagens = '/imagens/imovel-id_'.$imoveis->id.'.'.$extensao;
                $imoveis->save();
            }
        
        return redirect('admin/imoveis');
    }

    
    public function destroy($id)
    {
        $imoveis = Imoveis::find($id);
        File::delete(public_path().$imoveis->imagem);
        $imoveis->delete();
        return redirect('admin/imoveis');
    }

    public function search(Request $request, Imoveis $imovel){
    	$data = $request->all();
    	$imoveis = $imovel->search($data);
    	return view('admin.imoveis.index',compact('imoveis',$imoveis));
    }

    public function import(){
        return view('admin.imoveis.import');
    }

    public function importImoveis(Request $request){
        $link = $request->url;
        $xml = simplexml_load_file($link, 'SimpleXMLElement', LIBXML_NOCDATA )->Imoveis;
        foreach($xml->Imovel as $item){
            echo $item->CodigoImovel;
            $imoveis = new Imoveis;
            $imoveis->codigo_imovel = $item->CodigoImovel;
            $imoveis->tipo_imovel = $item->TipoImovel;
            $imoveis->titulo_imovel = $item->titulo_imovel;
            $imoveis->cep = $item->CEP;
            $imoveis->cidade = $item->Cidade;
            $imoveis->bairro = $item->Bairro;
            $imoveis->estado = $item->UF;
            $imoveis->numero = $item->Numero;
            $imoveis->rua = $item->rua;
            $imoveis->complemento = $item->Complemento;
            $imoveis->valor_venda = $item->PrecoVenda;
            $imoveis->valor_venda = str_replace(".", "", $imoveis->valor_venda);
            $imoveis->valor_locacao = $item->PrecoLocacao;
            $imoveis->valor_locacao = str_replace(".", "", $imoveis->valor_locacao);
            $imoveis->valor_temporada = $item->PrecoLocacaoTemporada;
            $imoveis->valor_temporada = str_replace(".", "", $imoveis->valor_temporada);
            $imoveis->area = $item->AreaTotal;
            $imoveis->area = str_replace("", "", $imoveis->area);
            $imoveis->qt_dormitorios = $item->QtdDormitorios;
            $imoveis->qt_suites = $item->QtdSuites;
            $imoveis->qt_banheiros = $item->QtdBanheiros;
            $imoveis->qt_salas = $item->QtdSalas;
            $imoveis->qt_garagem = $item->QtdVagas;
            $imoveis->descricao = $item->DescricaoLocalizacao;
            $imoveis->save();
        }
        return redirect('admin/imoveis');
    }
}
