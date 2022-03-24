<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->scopeOfFullName(),
            $user->phone_number,
            $user->email,
            $user->gender,
            $user->position,
            $user->state,
            $user->village,
            $user->services,
            $user->ward,
            $user->unit
        ];
    }

    public function headings(): array
    { 
        return [
            'Name',
            'Phone Number',
            'Email',
            'Gender',
            'Position',
            'State',
            'L.G.A',
            'Ward',
            'Unit',
        ];
    }
}
