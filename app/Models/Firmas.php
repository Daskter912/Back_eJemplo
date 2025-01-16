<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmas extends Model
{
    use HasFactory;
    protected $table = 'firmas';
    protected $primaryKey = 'REGISTRO_id';

    public $timestamps = false;
}