<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'data_nascimento', 'peso', 'altura', 'horas_msono'];
}
