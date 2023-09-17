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
    protected $tps;

    public function __construct($kota, $kecamatan)
    {
        $this->kota = $kota;
        $this->kecamatan = $kecamatan;
    }

    public function model(array $row)
    {

        if(!is_null($row[11])){
            $this->tps = preg_replace("/[^0-9]/", "", $row[11]);
        }

        return new Vote([
            'nama_lengkap' => $row[1] ?? '-',
            'jenis_kelamin' => $row[4] ?? '-',
            'umur' => $row[5] ?? '-',
            'kelurahan' => $row[6] ?? '-',
            'rt' => $row[8],
            'rw' => $row[9],
            'tps' => $this->tps ?? '000',
            'kota' => $this->kota,
            'kecamatan' => $this->kecamatan,
        ]);
    }
}
