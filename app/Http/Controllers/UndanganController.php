<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Sesi;
use App\Models\Undangan;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UndanganController extends Controller
{
    public function create_undangan()
    {
        $client = Client::all();

        return view('client::add-undangan', compact('client'));
    }

    public function undangan_client($id)
    {
        $client = Client::where('id_client', $id)->firstorfail();
        $id_client = $client->id_client;
        $data = new Undangan();
        $undangan = $data->undangan_client($id_client);


        return view('client::dashboard-client', compact('undangan', 'client'));
    }

    public function kehadiran_tamu(Request $request)
    {
        $code = $request->input('kode_tamu');
        $kehadiran = $request->input('kehadiran');
        Tamu::where('kode', '=', $code)
                 ->update(['kehadiran' => $kehadiran]);
        return redirect()->back();
    }

    public function chart_tamu($code)
    {
    $id_client = Client::where('kode', $code)->pluck('id_client')->first();

    $undangan = Undangan::where('id_client', $id_client)->get();

    // Array untuk menyimpan hasil
    $hasil = [];

    // Iterasi setiap undangan
    foreach ($undangan as $undanganItem) {
        // Mengambil sesi untuk undangan tertentu
        $sesiUndangan = Sesi::where('id_undangan', $undanganItem->id_undangan)->get();

        // Iterasi setiap sesi untuk undangan tertentu
        foreach ($sesiUndangan as $sesiItem) {
            // Menghitung jumlah tamu untuk undangan dan sesi tertentu
            $jumlahTamu = Tamu::where('id_undangan', $undanganItem->id_undangan)
                                ->where('id_sesi', $sesiItem->sesi)
                                ->count();

            // Menyimpan hasil dalam array
            $hasil[] = [
                'undangan' => $undanganItem->nama_mempelai_pria." & ".$undanganItem->nama_mempelai_pria,
                'sesi' => $sesiItem->sesi,
                'jumlah_tamu' => $jumlahTamu,
            ];
        }
    }

    // Mengembalikan hasil dalam bentuk response atau dapat digunakan untuk ditampilkan dalam view
    return response()->json($hasil);
    }

    public function chart_kehadiran($code)
    {
    $id_client = Client::where('kode', $code)->pluck('id_client')->first();

    $undangan = Undangan::where('id_client', $id_client)->get();

    // Array untuk menyimpan hasil
    $hasil1 = [];

    // Iterasi setiap undangan
    foreach ($undangan as $undanganItem) {
        // Mengambil sesi untuk undangan tertentu
        $sesiUndangan = Sesi::where('id_undangan', $undanganItem->id_undangan)->get();

        // Iterasi setiap sesi untuk undangan tertentu
        foreach ($sesiUndangan as $sesiItem) {
            // Menghitung jumlah tamu untuk undangan dan sesi tertentu
            $jumlahTamu = Tamu::where('id_undangan', $undanganItem->id_undangan)
                                ->where('id_sesi', $sesiItem->sesi)
                                ->where('kehadiran', 1)
                                ->count();

            // Menyimpan hasil dalam array
            $hasil1[] = [
                'undangan' => $undanganItem->nama_mempelai_pria." & ".$undanganItem->nama_mempelai_pria,
                'sesi' => $sesiItem->sesi,
                'jumlah_tamu' => $jumlahTamu,
            ];
        }
    }

    // Mengembalikan hasil dalam bentuk response atau dapat digunakan untuk ditampilkan dalam view
    return response()->json($hasil1);
    }
    public function chart_baca($code)
    {
    $id_client = Client::where('kode', $code)->pluck('id_client')->first();

    $undangan = Undangan::where('id_client', $id_client)->get();

    // Array untuk menyimpan hasil
    $hasil1 = [];

    // Iterasi setiap undangan
    foreach ($undangan as $undanganItem) {
        // Mengambil sesi untuk undangan tertentu
        $sesiUndangan = Sesi::where('id_undangan', $undanganItem->id_undangan)->get();

        // Iterasi setiap sesi untuk undangan tertentu
        foreach ($sesiUndangan as $sesiItem) {
            // Menghitung jumlah tamu untuk undangan dan sesi tertentu
            $jumlahTamu = Tamu::where('id_undangan', $undanganItem->id_undangan)
                                ->where('id_sesi', $sesiItem->sesi)
                                ->where('status_baca', 1)
                                ->count();

            // Menyimpan hasil dalam array
            $hasil1[] = [
                'undangan' => $undanganItem->nama_mempelai_pria." & ".$undanganItem->nama_mempelai_pria,
                'sesi' => $sesiItem->sesi,
                'jumlah_tamu' => $jumlahTamu,
            ];
        }
    }

    // Mengembalikan hasil dalam bentuk response atau dapat digunakan untuk ditampilkan dalam view
    return response()->json($hasil1);
    }
}
