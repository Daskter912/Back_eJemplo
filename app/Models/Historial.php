<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth;

class Historial extends Model
{
    use HasFactory;
    protected $table = 'historial';
    protected $primaryKey = 'REGISTRO_id';

    public $timestamps = false;
} 

