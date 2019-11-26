<?php


namespace App\Repositories;
use App\Models\Reservas;
use App\Models\Horario;
use App\Repositories\Contracts\HorarioRepositoryInterface;
use Illuminate\Http\Request;

class HorarioRepositoryEloquent implements HorarioRepositoryInterface

{
        public  function __construct(Horario $horario)
    {
        $this->horario=$horario;
    }
        public function  getAll()
    { 
        return $this->horario->all();
    }
    
   
   
}

