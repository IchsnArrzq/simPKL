<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row[4],
            'nama' => $row[5],
            'tingkat' => $row[6],
            'pembimbing_industri_id' => $row[7],
            'pembimbing_sekolah_id' => $row[8],
            'user_id' => $row[9]
        ]);
    }
}
