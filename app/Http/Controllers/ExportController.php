<?php

namespace App\Http\Controllers;

use App\Exports\ModelExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ModelExport, 'rating.csv');
    }
}