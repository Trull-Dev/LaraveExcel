<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Entreprise extends Model
{
    use Sortable;

    protected $fillable = [
        'numero', 'denomination', 'adresse', 'telephone',
    ];

    public $sortable = ['numero', 'denomination', 'adresse', 'telephone'];
}
