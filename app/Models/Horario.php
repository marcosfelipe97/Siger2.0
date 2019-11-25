<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservas;

class Horario extends Model
{

    protected $table = 'horario';
    protected $fillable = ['id','descricao','hora'];

    public function reservas()
    {
        return $this->hasOne(Reservas::class,'horario_id', 'id');
    }


}


