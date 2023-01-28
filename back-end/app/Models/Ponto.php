<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'name',
        'ponto_chegada',
        'ponto_saida',
        'horas_diurnas',
        'horas_noturnas'
    ];
}
