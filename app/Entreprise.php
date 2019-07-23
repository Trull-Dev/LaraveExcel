<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'numero', 'denomination', 'adresse', 'telephone',
    ];
}
