<?php

namespace App\Exports;

use App\Models\Rating;
use Maatwebsite\Excel\Concerns\FromCollection;

class ModelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rating::all(); // Replace with your actual query
    }

    public function headings(): array
    {
        return [
            'user_id',
            'product_id',
            'rating',
            'timestamps',
        ];
    }
}