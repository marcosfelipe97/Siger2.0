<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Equipamentos;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( )
    {
        $this->middleware('auth');
    }

    
   
    
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        //dd($user->hasRole('Administrador'));
        
       
        return view('home');
    }
}
