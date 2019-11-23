<?php


namespace App\Repositories;
use App\Models\Reservas;
use App\Models\Equipamentos;
use App\Repositories\Contracts\ReservasRepositoryInterface;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReservasRepositoryEloquent implements ReservasRepositoryInterface

{
     public  function __construct(Reservas $reservas)
    {
        $this->reservas=$reservas;
    }
  
     public function  getAll()
   { 
        return $this->reservas->orderBy('dt_agendamento', 'DESC')
        ->has('equipamentos')->paginate(10);
      
   }
     public function  getTodos()
   {
      return $this->reservas->all();
   }
   public function getReservados()
   {
      $hoje= \Carbon\Carbon::now()->format('Y-m-d');
      return $this->reservas->where([['is_devolvido', false], ['dt_agendamento','=', $hoje ]])
      ->get();
   }
    
    public function getById($id)
   {
      return  $this->reservas->find($id);
   }
    
    public function create(array $attributes)
   {
     return $this->reservas->create($attributes);
   }
        
    public function delete($id)
     {
        $this->getById($id)->delete();
        return true;
     }

    
    

        
   
}

