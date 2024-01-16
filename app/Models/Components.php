<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    use HasFactory;

    public function formatacaoMascaraDinheiroDecimal($valor)
    {
        $tamanho = strlen($valor);
        $dados = str_replace(',', '.', $valor);
        if($tamanho <= 6){
            $dados = str_replace(',', '.', $valor);
        } else {
            if($tamanho>=9 && $tamanho <= 10){
                $retiraVirgulaPorPonto = str_replace(',', '.', $valor);
                $separaPorIndice = explode('.', $retiraVirgulaPorPonto);
                $dados = $separaPorIndice[0] . $separaPorIndice[1];
            }
        }

        return $dados;

    }
}
