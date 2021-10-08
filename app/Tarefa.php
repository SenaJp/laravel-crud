<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model //representa a tabela no banco
{
    protected $table = 'task_lists';
    public $timestamps = false;
    protected $fillable = ['task'];
}
