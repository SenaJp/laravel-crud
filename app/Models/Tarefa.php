<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    const INCOMPLETO = 1;
    const COMPLETO = 2;


    protected $table = 'task_lists';
    public $timestamps = false;
}
