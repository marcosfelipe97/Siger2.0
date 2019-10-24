<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Equipamentos;
use App\Repositories\Contracts\EquipamentosRepositoryInterface;
use App\Repositories\Contracts\ReservasRepositoryInterface;
use PDF;
use DB;
use Carbon\Carbon;


/**
 * Class ReservasController
 * @package App\Http\Controllers
 */
class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    

    public function __construct(ReservasRepositoryInterface $repore, EquipamentosRepositoryInterface $repo)
    {
            $this->repore=$repore;
            $this->repo=$repo;
    } 
     public function index()
    {       
        /*Este método serve para exibição da tela de pricipal de reservas,
         onde será exibido por nome em ordem decrescente

         */

        $reservas =  $this->repore->getAll();
        return view('reservas.index', compact('reservas'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* Este método serve para exibir a view das Reservas
          e verifica se o status dos equipamentos para reservas
        
        */
        
        $reservas=$this->repore->getTodos();
        $equipamentos=$this->repo->getAll();
        return view('reservas.create')->withEquipamentos($equipamentos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        /* Este método serve para guardar as reservas, onde passará por um
            array de verificação para certificar se estão corretas as informações
        */

        
        
        $request->validate([
            'equipamentos_id'          => 'required',
            'dt_agendamento'           => 'required|date|date_format:Y-m-d|after_or_equal:'.\Carbon\Carbon::now()->format('Y-m-d'),
            'horario'                   =>'required',
            
        ],
        [   'equipamentos_id.required'=>'Selecione um equipamento para reservar o equipamento',
            'dt_agendamento.required'=>'Selecione uma data para reservas o equipamento',
            'dt_agendamento.after_or_equal' =>'Data inválida',
            'horario.required'=>'Selecione o turno desejado para reserva',
        ]);

         /* 
               Esta parte do código serve para instanciar a classe reservas
               e usar o metodo create que irá preparar as informações para 
               serem guardadas 
        */
      
        $data = DB::table('reservas')
        ->where([
                ['equipamentos_id', '=', $request->input('equipamentos_id')],
                ['horario', '=', $request->input('horario')],
                ['dt_agendamento','=',$request->input('dt_agendamento')]
                ])->count();    
            
           $hoje= \Carbon\Carbon::now()->format('Y-m-d');
           $horaatual= \Carbon\Carbon::now()->format('H-i-s');
            

        if($data == 0 || $request->input('dtagendamento')== $hoje && $request->input('horario') < $horaatual )
        {           
           $reservas = $this->repore->create([
                'equipamentos_id'           => $request->get('equipamentos_id'),
                'user_id'                   => auth()->user()->id,
                'dt_agendamento'            => $request->get('dt_agendamento'),
                'horario'                   => $request->get('horario'),
               
            ]);      
            
            $equipamentos = $this->repo->getById($request->get('equipamentos_id'));
            $equipamentos->status = 'Indisponível';
            $equipamentos->save();
            alert()->success('Reserva  realizada com sucesso');
            return redirect('/reservas');    
        }
        else
        {
            alert()->error('Este equipamento não pôde ser reservado nesta  data ou horário');
            return redirect('/reservas');
      }
                    
        

       

    
       
        
                
     
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
     public function destroy($id)
    {  
                /*
            Este método serve para excluir a reserva selecionada e 
            efetuar a exclusão da reserva
            */
        
        $reservas =$this->repore->getById($id);
        $equipamentos = $this->repo->getById($reservas->equipamentos_id);
        $equipamentos->status = 'Disponível';
        $equipamentos->save();
        $reservas=$this->repore->delete($id);
        alert()->success('Reserva  cancelada com sucesso');
        return redirect('/reservas');
    }
   
    public function generatePDF()
    {
        $reservas=$this->repore->getAll();
        $pdf = PDF::loadView('reservas/reservaPDF',['reservas'=> $reservas])->setPaper('a4', 'landscape');
        return $pdf->download('reservas.pdf');
    }
}

