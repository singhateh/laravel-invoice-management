<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    public function query()
    {
        return User::select([
            'name',
            'email',
            'phone',
            'created_at',
        ]);
    }

    public function headings(): array
    {
        return
       ['USER NAME',
        'USER EMAIL',
        'USER PHONE',
        'JOINED DATE',
    ];
    }
}
