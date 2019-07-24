<?php

namespace App\Exports;

use App\Entreprise;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class EntreprisesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $nombreItems;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Entreprise::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Numéro',
            'Dénomination',
            'Adresse',
            'Téléphone',
            'Created at',
            'Updated at'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange1 = 'A1:G1';
                $styleArray1 = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['0000'],
                        ],
                    ],
                ];
                $nombreItems = Entreprise::all()->count() + 1;
                $cellRange2 = 'A2:G'.$nombreItems.'';
                $styleArray2 = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['0000'],
                        ],
                    ],
                ];
                $event->sheet->getDelegate()->getStyle($cellRange1)->applyFromArray($styleArray1);
                $event->sheet->getDelegate()->getStyle($cellRange2)->applyFromArray($styleArray2);
            },
        ];
    }
}
