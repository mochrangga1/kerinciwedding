<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Sesi;
use App\Models\Client;
use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;

class UndanganController extends Controller
{
    public function list_undangan()
    {
        $data_undangan = new Undangan();
        $undangan = $data_undangan->list_undangan();
        $client = Client::all();
        // return($undangan);
        return view('admin::list-undangan', compact('undangan','client'));
    }

    public function add_undangan(Request $request)
    {
        // dd($request->all());

        $image_cover = $request->file('foto_cover');
        $image_pria = $request->file('foto_pria');
        $image_wanita = $request->file('foto_wanita');
        $image_prewedding = $request->file('foto_prewed');

        $undangan = new Undangan();

        $undangan->id_user = auth()->user()->id;
        $undangan->id_client = $request->input('id_client');
        $undangan->nama_mempelai_pria = $request->input('nama_pria');
        $undangan->nama_mempelai_wanita = $request->input('nama_wanita');
        $undangan->nama_ayah_pria = $request->input('ayah_pria');
        $undangan->nama_ayah_wanita = $request->input('ayah_wanita');
        $undangan->nama_ibu_pria = $request->input('ibu_pria');
        $undangan->nama_ibu_wanita = $request->input('ibu_wanita');
        $undangan->lokasi_acara = $request->input('lokasi');
        $undangan->alamat_pria = $request->input('alamat_pria');
        $undangan->alamat_wanita = $request->input('alamat_wanita');
        $undangan->tgl_waktu_akad = $request->input('tanggal_akad');
        $undangan->maps = $request->input('maps');
        $undangan->quotes = $request->input('qoutes');
        $undangan->tema = $request->input('tema');

        $undangan->save();
        $undanganId = $undangan->id_undangan;

        $imagePaths['foto_cover'] = 'undangan_' . $undanganId . '_cover.' . $image_cover->getClientOriginalExtension();
        $imagePaths['foto_pria'] = 'undangan_' . $undanganId . '_pria.' . $image_pria->getClientOriginalExtension();
        $imagePaths['foto_wanita'] = 'undangan_' . $undanganId . '_wanita.' . $image_wanita->getClientOriginalExtension();
        $imagePaths['foto_prewed'] = 'undangan_' . $undanganId . '_prewedding.' . $image_prewedding->getClientOriginalExtension();

        $image_cover->move(public_path('images'), $imagePaths['foto_cover']);
        $image_pria->move(public_path('images'), $imagePaths['foto_pria']);
        $image_wanita->move(public_path('images'), $imagePaths['foto_wanita']);
        $image_prewedding->move(public_path('images'), $imagePaths['foto_prewed']);

        $undangangambar = Undangan::where('id_undangan', $undanganId)->first();
        $undangangambar->update([
            'foto_prewed' => $imagePaths['foto_prewed'],
            'foto_cover' => $imagePaths['foto_cover'],
            'foto_pria' => $imagePaths['foto_pria'],
            'foto_wanita' => $imagePaths['foto_wanita'],
        ]);

        foreach ($request->input('sesi') as $sesiKe => $sesiData) {
            $kode_sesi = Sesi::generateUniqueCode();
            Sesi::create([
                'id_undangan' => $undangan->id_undangan,
                'waktu' => $sesiData,
                'sesi' => $sesiKe + 1,
                'kode' => $kode_sesi
            ]);

        }

        return(redirect('/admin/undangan'));
    }

    public function update_undangan(Request $request,$id)
    {
        $image_cover = $request->file('foto_cover');
        $image_pria = $request->file('foto_pria');
        $image_wanita = $request->file('foto_wanita');
        $image_prewedding = $request->file('foto_prewed');

        $undangan = Undangan::where('id_undangan', $id)->first();

        $undangan->id_user = auth()->user()->id;
        $undangan->nama_mempelai_pria = $request->input('nama_pria');
        $undangan->nama_mempelai_wanita = $request->input('nama_wanita');
        $undangan->nama_ayah_pria = $request->input('ayah_pria');
        $undangan->nama_ayah_wanita = $request->input('ayah_wanita');
        $undangan->nama_ibu_pria = $request->input('ibu_pria');
        $undangan->nama_ibu_wanita = $request->input('ibu_wanita');
        $undangan->lokasi_acara = $request->input('lokasi');
        $undangan->alamat_pria = $request->input('alamat_pria');
        $undangan->alamat_wanita = $request->input('alamat_wanita');
        $undangan->tgl_waktu_akad = $request->input('tanggal_akad');
        $undangan->maps = $request->input('maps');
        $undangan->quotes = $request->input('qoutes');
        $undangan->tema = $request->input('tema');

        $undangan->save();
        $undanganId = $undangan->id_undangan;

        $imagePaths = [];

        if ($request->hasFile('foto_cover')) {
            Storage::delete($undangan->foto_cover);
            $image_cover = $request->file('foto_cover');
            $imagePaths['foto_cover'] = 'undangan_' . $undanganId . '_cover.' . $image_cover->getClientOriginalExtension();
            $image_cover->move(public_path('images'), $imagePaths['foto_cover']);
        }

        if ($request->hasFile('foto_pria')) {
            Storage::delete($undangan->foto_pria);
            $image_pria = $request->file('foto_pria');
            $imagePaths['foto_pria'] = 'undangan_' . $undanganId . '_pria.' . $image_pria->getClientOriginalExtension();
            $image_pria->move(public_path('images'), $imagePaths['foto_pria']);
        }

        if ($request->hasFile('foto_wanita')) {
            Storage::delete($undangan->foto_wanita);
            $image_wanita = $request->file('foto_wanita');
            $imagePaths['foto_wanita'] = 'undangan_' . $undanganId . '_wanita.' . $image_wanita->getClientOriginalExtension();
            $image_wanita->move(public_path('images'), $imagePaths['foto_wanita']);
        }

        if ($request->hasFile('foto_prewed')) {
            Storage::delete($undangan->foto_prewed);
            $image_prewedding = $request->file('foto_prewed');
            $imagePaths['foto_prewed'] = 'undangan_' . $undanganId . '_prewedding.' . $image_prewedding->getClientOriginalExtension();
            $image_prewedding->move(public_path('images'), $imagePaths['foto_prewed']);
        }

        if ($imagePaths) {
            $undangangambar = Undangan::where('id_undangan', $undanganId)->first();
            $undangangambar->update($imagePaths);
        }

        Sesi::where('id_undangan', $id)->delete();

        foreach ($request->input('sesi') as $sesiKe => $sesiData) {
            $kode_sesi = Sesi::generateUniqueCode();
            Sesi::create([
                'id_undangan' => $undangan->id_undangan,
                'waktu' => $sesiData,
                'sesi' => $sesiKe + 1,
                'kode' => $kode_sesi
            ]);

        }

        return(redirect('/admin/undangan'));
    }

    public function edit_undangan($id)
    {

        $undangan = Undangan::where('id_undangan', $id)->first();
        $sesi = Sesi::where('id_undangan', $id)->get()->pluck('waktu');
        $id_client = $undangan->id_client;
        $client = Client::where('id_client', $id_client)->pluck('nama_client')->first();

        return view('admin::edit-undangan', compact('undangan','client', 'sesi'));
    }

    public function fetch_undangan($id)
    {

        $undangan = Undangan::where('id_undangan', $id)->first();

        $undangan->foto_cover = asset('images/' . $undangan->foto_cover);
        $undangan->foto_pria = asset('images/' . $undangan->foto_pria);
        $undangan->foto_wanita = asset('images/' . $undangan->foto_wanita);
        $undangan->foto_prewed = asset('images/' . $undangan->foto_prewed);

        $sesi = Sesi::where('id_undangan', $id)->get()->pluck('waktu');
        $id_client = $undangan->id_client;
        $client = Client::where('id_client', $id_client)->pluck('nama_client')->first();

        return response()->json(
            array_merge(
                $undangan->toArray(),
                ['sesi' => $sesi->toArray()],
                ['client' => $client]
            )
        );
    }

    public function delete_undangan($id)
    {
        $undangan = Undangan::where('id_undangan',$id)->first();
        $oldCover = $undangan->foto_cover;
        $oldPrewed = $undangan->foto_prewed;
        $oldPria = $undangan->foto_pria;
        $oldWanita = $undangan->foto_wanita;
        $oldCover = $undangan->foto_cover;
        unlink(public_path("/images/{$oldCover}"));
        unlink(public_path("/images/{$oldPrewed}"));
        unlink(public_path("/images/{$oldPria}"));
        unlink(public_path("/images/{$oldWanita}"));


        Undangan::where('id_undangan', $id)
                ->delete();
        Sesi::where('id_undangan', $id)
                ->delete();
        return response()->json([
            'success' => true,
        ]);
    }
}
