<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegaciones extends Model
{
    use HasFactory;

    protected $table = 'delegacion';
    protected $primaryKey = 'REGISTRO_id';

    public $timestamps = false;
}
