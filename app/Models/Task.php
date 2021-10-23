<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\app\models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\database\seeders\UserSeeder;

class Task extends Model
{
    use HasFactory;

    const INCOMPLETE = 1;
    const COMPLETE = 2;

    protected $table = 'task_lists';
    public $timestamps = false;

    Protected $fillable = [
        'name',
        'user_id',
        'task',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
