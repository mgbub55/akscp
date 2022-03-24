<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'first_name' => $row['firstname'],
            'last_name' => $row['lastname'],
            'phone_number' => $row['phonenumber'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'position' => $row['position'],
            'state' => $row['state'],
            'village' => $row['village'],
            'services' => $row['services'],
            'ward' => $row['ward'],
            'unit' => $row['unit'],
            'disability' => $row['disability']

        ]);
    }
}
