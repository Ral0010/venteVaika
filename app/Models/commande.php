<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $primaryKey = 'idComm';
    protected $fillable = [
        'idCli',
        'cinCli',
        'nomCli',
        'idV',
        'modelV',
        'numIm',
        'prixV'
    ];
   }
