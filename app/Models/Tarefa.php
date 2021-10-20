<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\app\models\user;
use Illuminate\database\seeders\UserSeeder;

class Tarefa extends Model
{
    const INCOMPLETE = 1;
    const COMPLETE = 2;

    protected $table = 'task_lists';
    public $timestamps = false;

    Protected $fillable = [
        'task',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
