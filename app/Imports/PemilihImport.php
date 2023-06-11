<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class PemilihImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row[2]),
            'nis' => $row[3],
            'kelas' => $row[4],
            'roles' => $row[5],
            'status' => $row[6],
        ]);
    }

    public function rules(): array
    {
        return [
            '3' => 'required|unique:users,nis',
        ];
    }
}
