<?php

namespace App\Imports;

use App\Entreprise;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Validation\Rule;
use Throwable;


class EntreprisesImport implements ToModel, WithStartRow, SkipsOnError
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

    public function startRow(): int {
        return 2;
    }

    public function rules(): array
    {
        return [
            'numero' => Rule::unique('entreprises', 'numero'), // Table name, field in your db
        ];
    }

    /**
     * @param Throwable $e
     */
    public function onError(Throwable $e)
    {
        // TODO: Implement onError() method.
    }
}
