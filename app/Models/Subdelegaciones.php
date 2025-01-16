<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdelegaciones extends Model
{
    use HasFactory;
    protected $table = 'subdelegacion';
    protected $primaryKey = 'REGISTRO_id';

    public $timestamps = false;
}
