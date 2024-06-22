<?php

namespace App\Imports;

use App\Models\Tamu;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class TamuImport implements ToModel
{
    public $id_sesi;
    public $id_undangan;

    public function __construct($id_sesi, $id_undangan)
    {
        $this->id_sesi = $id_sesi;
        $this->id_undangan = $id_undangan;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tamu([
            'id_sesi' => $this->id_sesi,
            'id_undangan' => $this->id_undangan,
            'nama_tamu' => $row[0],
            'alamat' => $row[1],
            'no_hp' => $row[2],
            'kode' => Tamu::generateUniqueCode(),
        ]);
    }
}
