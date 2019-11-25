<?php

use Illuminate\Database\Seeder;
use \App\Models\Horario;

class HorarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create(
        [

            'descricao'      => 'De 08:00h às 09:00h',
            'hora'           => '08:00:00',            
        ]);
        Horario::create(
        [

            'descricao'      => 'De 09:00h às 10:00h',
            'hora'           => '09:00:00',            
        ]);
        Horario::create(
        [

            'descricao'      => 'De 10:00h às 11:00h',
            'hora'           => '10:00:00',            
        ]);
        Horario::create([

            'descricao'      => 'De 11:00h às 12:00h',
            'hora'           => '11:00:00',            
        ]);
        Horario::create([

            'descricao'      => 'De 12:00h às 13:00h',
            'hora'           => '12:00:00',            
        ]);
        Horario::create([

            'descricao'      => 'De 13:00h às 14:00h',
            'hora'           => '13:00:00',            
        ]);
        Horario::create(
        [

            'descricao'      => 'De 14:00h às 15:00h ',
            'hora'           => '14:00:00',            
        ]);
        Horario::create(
             [

            'descricao'      => 'De 15:00h às 16:00h',
            'hora'           => '15:00:00',            
        ]);
        Horario::create([

            'descricao'      => 'De 16:00h às 17:00h',
            'hora'           => '16:00:00',            
        ]);
        Horario::create([

            'descricao'      => 'De 17:00h às 18:00h ',
            'hora'           => '17:00:00',            
        ]);
        Horario::create( [

            'descricao'      => 'De 18:00h às 18:50h ',
            'hora'           => '18:00:00',            
        ]);
        Horario::create([

            'descricao'      => 'De 18:50h às 19:40h ',
            'hora'           => '18:50:00',            
        ]);
        
        Horario::create( [

            'descricao'      => 'De 19:40h às 20:30h ',
            'hora'           => '19:40:00',            
        ]);
      
        
        Horario::create( [

            'descricao'      => 'De 20:50h às 21:40h ',
            'hora'           => '20:50:00',            
        ]);
        Horario::create( [

            'descricao'      => 'De 21:40h às 22:30h ',
            'hora'           => '21:40:00',            
        ]);
    
    
    
    
    
    
    }
}
