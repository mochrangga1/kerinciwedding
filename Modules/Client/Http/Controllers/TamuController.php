<?php

namespace Modules\Client\Http\Controllers;

use App\Imports\TamuImport;
use App\Models\Sesi;
use App\Models\Tamu;
use App\Models\Client;
use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TamuController extends Controller
{
    public function tamu_client($client, $code)
    {
        // $data = new Undangan();
        // $undangan = $data->undangan_client($id);
        // $client = Client::where('id_client', $id)->first();


        $code = $code;
        $data = Sesi::where('kode', $code)->first();
        $id_undangan = $data->id_undangan;
        $id_sesi = $data->id_sesi;
        $undangan = Undangan::where('id_undangan', $id_undangan)->first();
        $id_client = $undangan->id_client;

        $client =  $client;
        return view('client::list-tamu', compact('id_undangan','client','code'));
    }

    public function save_tamu(Request $request, $code)
    {
        $data = $request->input('data');
        $code = $code;
        $data_undangan = Sesi::where('kode', $code)->first();
        $id_undangan = $data_undangan->id_undangan;
        $sesi = $data_undangan->sesi;
        foreach ($data as $item) {
            $kode = Tamu::generateUniqueCode();
            Tamu::create([
                'id_undangan' => $id_undangan,
                'id_sesi' => $sesi,
                'nama_tamu' => $item['nama'],
                'alamat' => $item['alamat'],
                'no_hp' => $item['hp'],
                'kode' => $kode,
            ]);
        }
    }

    public function get_tamu($id)
    {
        $tamu = Tamu::where('id_tamu', $id)->first();

        return response()->json($tamu);
    }

    public function add_tamu(Request $request)
    {
        $nama_tamu = $request->input('nama_tamu');
        $alamat_tamu = $request->input('alamat');
        $no_hp = $request->input('no_hp');
        $id_undangan = $request->input('id_undangan');
        $id_sesi = $request->input('id_sesi');
        $kode = Tamu::generateUniqueCode();
        Tamu::create([
            'id_undangan' => $id_undangan,
            'id_sesi' => $id_sesi,
            'nama_tamu' => $nama_tamu,
            'alamat' => $alamat_tamu,
            'no_hp' => $no_hp,
            'kode' => $kode,
        ]);

        return redirect()->back();
    }

    public function import_tamu(Request $request)
    {
        $id_undangan = $request->input('id_undangan');
        $id_sesi = $request->input('id_sesi');
        $file = $request->file('file');
        $nama_file = $file->hashName();
        $path = $file->storeAs('public/import', $nama_file);

        Excel::import(new TamuImport($id_sesi, $id_undangan), storage_path('app/public/import/'.$nama_file));

        Storage::delete($path);

        return redirect()->back();
    }

    public function update_tamu(Request $request)
    {
        $id = $request->input('id_tamu');
        $nama_tamu = $request->input('nama_tamu');
        $alamat_tamu = $request->input('alamat');
        $no_hp = $request->input('no_hp');
        DB::table('tamu')
            ->where('id_tamu', '=', $id)
            ->update(['nama_tamu' => $nama_tamu, 'alamat' => $alamat_tamu,'no_hp' => $no_hp]);

        return redirect()->back();
    }

    public function delete_tamu($id)
    {
        Tamu::where('id_tamu', $id)
        ->delete();
    }
}
