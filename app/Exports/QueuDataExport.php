<?php

namespace App\Exports;

use Collator;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QueuDataExport implements FromView
{
    public function view(): View
    {
        return view('admin.excel.example-queue');
    }
}
