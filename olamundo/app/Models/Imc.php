<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    protected $fillable = ['nome', 'data_nascimento', 'peso', 'altura'];
}