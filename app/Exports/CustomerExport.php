<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CustomerExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Customer::select([
            'name',
            'email',
            'phone',
            'address_1' ,
            'address_2' ,
            'country' ,
            'city' ,
            'post_code' ,
            'ship_name',
            'ship_email',
            'ship_phone',
            'ship_address_1' ,
            'ship_address_2' ,
            'ship_country' ,
            'ship_city' ,
            'ship_post_code' ,

        ]);
    }

    public function headings(): array
    {
        return
       ['NAME',
        'EMAIL',
        'PHONE',
        'ADDRESS 1' ,
        'ADDRESS 2' ,
        'COUNTRY' ,
        'CITY' ,
        'POSTCODE' ,
        'SHIPPING NAME',
        'SHIPPING EMAIL',
        'SHIPPING PHONE',
        'SHIPPING ADDRESS 1' ,
        'SHIPPING ADDRESS 2' ,
        'SHIPPING COUNTRY' ,
        'SHIPPING CITY' ,
        'SHIPPING POSTCODE' ,

    ];
    }
}
