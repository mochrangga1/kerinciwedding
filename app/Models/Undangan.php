<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Undangan extends Model
{
    use HasFactory;

    protected $table = 'undangan';
    protected $primaryKey = 'id_undangan';
    protected $fillable = [
        'id_user',
        'id_client',
        'nama_mempelai_pria',
        'nama_mempelai_wanita',
        'nama_ayah_pria',
        'nama_ayah_wanita',
        'nama_ibu_pria',
        'nama_ibu_wanita',
        'lokasi_acara',
        'maps',
        'foto_cover',
        'foto_pria',
        'foto_wanita',
        'alamat_pria',
        'alamat_wanita',
        'foto_prewed',
        'quotes',
        'tema',
        'kode',
        'tgl_waktu_akad',
        'created_at',
        'updated_at',
    ];
    public function tamu()
    {
        return $this->hasMany(Tamu::class, 'id_undangan', 'id_undangan');
    }

    public function undangan($id,$sesi,$kode, $status_kehadiran,$nama_tamu)
    {
        $undangan = $this::where('id_undangan',$id)->firstorfail();
        // $sesi = Sesi::where('id_undangan', $id)->pluck('waktu')->firstorfail();
        $sesi = DB::table('sesi')
            ->where('id_undangan', '=', $id)
            ->where('sesi', '=', $sesi)
            ->pluck('waktu')
            ->firstOrFail();
        // return($sesi);
        $tanggal_resepsi = Carbon::parse($sesi)->format('d-m-Y');
        $jam_resepsi =  Carbon::parse($sesi)->format('H:i');
        $tanggal_akad = Carbon::parse($undangan->tgl_waktu_akad)->format('d-m-Y');
        $jam_akad = Carbon::parse($undangan->tgl_waktu_akad)->format('H:i');
        // return($undangan);
        $code = $kode;
        $kehadiran = $status_kehadiran;
        $nama_tamu = $nama_tamu;
        if($undangan->tema == 1) {
            return view('Undangan.undangan1', compact('undangan','tanggal_resepsi','jam_resepsi','tanggal_akad','jam_akad', 'code','kehadiran', 'nama_tamu'));
        } else if($undangan->tema == 2) {
            return view('Undangan.undangan2', compact('undangan','tanggal_resepsi','jam_resepsi','tanggal_akad','jam_akad', 'code','kehadiran', 'nama_tamu'));
        }
    }

    public function undangan_show($id,$sesi,$tamu = null)
    {
        $undangan = $this::where('id_undangan',$id)->firstorfail();
        // $sesi = Sesi::where('id_undangan', $id)->pluck('waktu')->firstorfail();
        $sesi = DB::table('sesi')
            ->where('id_undangan', '=', $id)
            ->where('sesi', '=', $sesi)
            ->pluck('waktu')
            ->firstOrFail();
        // return($sesi);
        $tanggal_resepsi = Carbon::parse($sesi)->format('l, d F Y');
        $jam_resepsi =  Carbon::parse($sesi)->format('H:i');
        $tanggal_akad = Carbon::parse($undangan->tgl_waktu_akad)->format('l, d F Y');
        $jam_akad = Carbon::parse($undangan->tgl_waktu_akad)->format('H:i');
        $tahun_akad_countdown = Carbon::parse($undangan->tgl_waktu_akad)->format('Y');
        $bulan_akad_countdown = Carbon::parse($undangan->tgl_waktu_akad)->format('m');
        $tanggal_akad_countdown = Carbon::parse($undangan->tgl_waktu_akad)->format('d');
        $hari_akad_countdown = Carbon::parse($undangan->tgl_waktu_akad)->format('l');
        $jam_akad_countdown = Carbon::parse($undangan->tgl_waktu_akad)->format('H');
        // return($undangan);
        if($undangan->tema == 1) {
            return view('undangan::undangan1', compact('undangan','tanggal_resepsi','jam_resepsi','tanggal_akad','jam_akad', 'tamu'));
        } else if($undangan->tema == 2) {
            return view('undangan::undangan2', compact('undangan','tanggal_resepsi','jam_resepsi','tanggal_akad','jam_akad', 'tamu'));
        } else if($undangan->tema == 3) {
            return view('undangan::undangan3', compact('undangan','tanggal_resepsi','jam_resepsi','tanggal_akad','jam_akad', 'tahun_akad_countdown', 'bulan_akad_countdown', 'tanggal_akad_countdown', 'hari_akad_countdown', 'jam_akad_countdown', 'tamu'));
        } else if($undangan->tema == 4) {
            return view('undangan::undangan4', compact('undangan','tanggal_resepsi','jam_resepsi','tanggal_akad','jam_akad', 'tahun_akad_countdown', 'bulan_akad_countdown', 'tanggal_akad_countdown', 'hari_akad_countdown', 'jam_akad_countdown', 'tamu'));
        }
    }

    public function list_undangan()
    {
        return $this->join('client', 'client.id_client', '=', 'undangan.id_client')
                    ->leftjoin('tamu', 'tamu.id_undangan', 'undangan.id_undangan')
                    ->select('client.nama_client', 'undangan.lokasi_acara', 'undangan.tema', 'undangan.id_undangan', 'tamu.id_undangan as status_tamu')
                    ->distinct()
                    ->get();
    }

    public function undangan_client($id_client)
    {
        return $this->join('sesi', 'sesi.id_undangan', '=', 'undangan.id_undangan')
                    ->where('undangan.id_client', $id_client)
                    ->get();
    }

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
}
