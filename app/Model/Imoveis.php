<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    public function search(Array $data){
    	return $imoveis = $this->where(function ($query) use ($data){
    		if(isset($data['codigo']))
    			$query->where('codigo_imovel', $data['codigo']);
    	})->paginate();
    }
}
