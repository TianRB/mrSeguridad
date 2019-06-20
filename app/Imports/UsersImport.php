<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        //dd($rows);
        foreach ($rows as $row) {
             User::create([
                'name'     => $row['nombre'],
                'email'    => $row['email'], 
                'password' => bcrypt($row['password']),
                'recent'   => 'undefined'
            ]);
        }
    }
}
