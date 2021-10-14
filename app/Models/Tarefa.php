<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model //representa a tabela no banco
{
    const INCOMPLETO = 1;
    const COMPLETO = 2;


    protected $table = 'task_lists';
    public $timestamps = false;
   

}
