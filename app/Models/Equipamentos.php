<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Equipamentos
 * @package App\Models
 */
class Equipamentos extends Model
{
   
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'descricao',
        'marca',
        'modelo',
        'status',
        'numero_serie',
        'dt_aquisicao',
        'etiqueta',

    ];
    /**
     * @var string
     */
    protected $table ='equipamentos';
    /**
     * @var array
     */
   

    /**
     * @param $query
     * @param bool $status
     * @return mixed
     */
    public function scopeDisponivel($query, $status=true)
    {
        return $query->where('status', $status ? 'Disponível' : 'Indisponível');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reservas()
    {
        return $this->hasOne(Reservas::class,'equipamentos_id', 'id');
    }

    public function devolucao()
    {
        return $this->hasOne(Devolucao::class,'equipamentos_id', 'id');
    }

   


   
}
