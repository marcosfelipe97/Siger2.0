<?php

namespace App\Repositories\Contracts;

interface ReservasRepositoryInterface
{

 public function  getAll();
 public function  getTodos();
 public function  getReservados();
 public function  getById($id);
 public function  create(array $atributes);
 public function  delete($id);
 public function  getByDate($date);

    
    
}