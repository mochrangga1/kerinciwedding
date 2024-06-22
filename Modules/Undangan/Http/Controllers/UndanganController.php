<?php

namespace Modules\Undangan\Http\Controllers;

use App\Models\Sesi;
use App\Models\Tamu;
use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class UndanganController extends Controller
{
    public function undangan($code)
    {
        $sesi = Sesi::where('kode', $code)->first();
        $id = $sesi->id_undangan;
        $sesi = $sesi->sesi;
        $undangan = new Undangan();
        return($undangan->undangan_show($id,$sesi));
    }

    public function undangan_show($kode)
    {
        Tamu::where('kode', '=', $kode)
            ->update(['status_baca' => 1]);

        $data = new Undangan();

        $tamu = Tamu::where('kode', $kode)->first();
        $sesi = Sesi::where('id_undangan', $tamu->id_undangan)->first();
        $id = $tamu->id_undangan;
        $sesi = $sesi->sesi;

        return($data->undangan_show($id,$sesi,$tamu));
    }

    public function rsvp(Request $request, $kode)
    {
        $data_tamu = Tamu::where('kode', $kode)->first();

        $data_tamu->status_baca = 1;
        $data_tamu->kehadiran = $request->kehadiran ?? 1;
        $data_tamu->jumlah = $request->jumlah;
        $data_tamu->save();

        return response()->json([
            'message' => 'RSVP berhasil'
        ]);
    }
}
