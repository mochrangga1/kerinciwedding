<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tamu extends Model
{
    use HasFactory;
    protected $table = 'tamu';
    protected $primaryKey = 'id_tamu';
    protected $fillable = [
        'id_sesi',
        'id_undangan',
        'nama_tamu',
        'alamat',
        'no_hp',
        'kode',
        'kehadiran',
        'waktu_kehadiran',
        'created_at',
        'updated_at'
    ];

    public static function generateUniqueCode($length = 20)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $code = '';

        // Generate unique code
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Check uniqueness in the database
        while (self::where('kode', $code)->exists()) {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
        }

        return $code;
    }

    public function kehadiran($code)
    {
        return $this->join('undangan', 'undangan.id_undangan', '=', 'tamu.id_undangan')
                    ->join('client', 'client.id_client', '=', 'undangan.id_client')
                    ->where('tamu.kehadiran','=', 1)
                    ->where('client.kode', '=', $code)
                    ->groupBy(['kehadiran', 'tamu.id_undangan', 'id_sesi'])
                    ->select('kehadiran', 'id_sesi','tamu.id_undangan', DB::raw('count(*) as total'))
                    ->get();
    }
    public function ketidakhadiran($code)
    {
        return $this->join('undangan', 'undangan.id_undangan', '=', 'tamu.id_undangan')
                    ->join('client', 'client.id_client', '=', 'undangan.id_client')
                    ->where('tamu.kehadiran','=', 0)
                    ->where('client.kode', '=', $code)
                    ->groupBy(['kehadiran', 'tamu.id_undangan', 'id_sesi'])
                    ->select('kehadiran', 'id_sesi','tamu.id_undangan', DB::raw('count(*) as total'))
                    ->get();
    }

    public function count_kehadiran($code)
    {
        $data = $this->join('undangan', 'undangan.id_undangan', '=', 'tamu.id_undangan')
                    ->join('client', 'client.id_client', '=', 'undangan.id_client')
                    ->where('client.kode', '=', $code)
                    ->select('tamu.id_undangan', 'id_sesi', 'kehadiran')
                    ->get();
        return($data);
    }

    public function undangan_hadir($id_undangan, $id_sesi)
    {
        return Tamu::where('id_undangan', $id_undangan)
        ->where('id_sesi', $id_sesi)
        ->where('kehadiran', 1)
        ->count();
    }

    public function undangan_dibaca($id_undangan, $id_sesi)
    {
        return Tamu::where('id_undangan', $id_undangan)
        ->where('id_sesi', $id_sesi)
        ->where('status_baca', 1)
        ->count();
    }

    public function total_tamu($id_undangan, $id_sesi)
    {
        return Tamu::where('id_undangan', $id_undangan)
        ->where('id_sesi', $id_sesi)
        ->count();
    }

}
