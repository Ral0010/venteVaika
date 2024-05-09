<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voiture extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idV';
    protected $fillable = [
        'numIm',
        'modelV',
        'moteur',
        'couleur',
        'prixV'

    ];
}
