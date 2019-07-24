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
            'numero'          => $row[1],
            'denomination'    => $row[2],
            'adresse'         => $row[3],
            'telephone'       => $row[4],
        ]);
    }
}
