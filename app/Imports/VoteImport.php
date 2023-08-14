<?php

namespace App\Imports;

use App\Models\Vote;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class VoteImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $kota;
    protected $kecamatan;

    public function __construct($kota, $kecamatan)
    {
        $this->kota = $kota;
        $this->kecamatan = $kecamatan;
    }

    public function model(array $row)
    {

        return new Vote([
            'nama_lengkap' => $row[1] ?? '-',
            'jenis_kelamin' => $row[3] ?? '-',
            'umur' => $row[4] ?? '-',
            'kelurahan' => $row[5] ?? '-',
            'rt' => '00'. $row[7],
            'rw' => '00'. $row[8],
            'kota' => $this->kota,
            'kecamatan' => $this->kecamatan,
        ]);
    }
}
