<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucao extends Model
{
   
    protected $fillable = [
        'id',
        'reservas_id',
        'user_id',
        'obs',
        'data',
        'hora',
      ];
    protected $table ='devolucao';
   
   
    public function reservas()
    {
        return $this->hasOne(Reservas::class, 'id', 'reservas_id');
    }
    public function equipamentos()
    {
        return $this->hasOne(Equipamentos::class, 'id', 'equipamentos_id');
    }
    
  
   
    public function user(){
        return $this->BelongsTo(User::class);
    }
    
}
