<?php

namespace App\Imports;

use App\Entreprise;
use Maatwebsite\Excel\Concerns\ToModel;

class EntreprisesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Entreprise([
            'numero'          => $row[0],
            'denomination'    => $row[1],
            'adresse'         => $row[2],
            'telephone'       => $row[3],
        ]);
    }
}
