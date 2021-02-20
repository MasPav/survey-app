<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResponsesExport implements FromArray, WithStyles
{
    protected $responses;

    public function __construct(array $responses)
    {
        $this->responses = $responses;
    }

    public function array(): array
    {
        return $this->responses;
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
