<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;

class ClientController extends Controller
{
    public function addclient(Request $request)
    {
        $kode = Client::generateUniqueCode();
        $client = new Client();

        $client->id_user = auth()->user()->id;
        $client->nama_client = $request->input('nama_client');
        $client->username = $request->input('username');
        $client->password = bcrypt($request->input('password'));
        $client->no_hp = $request->input('no_hp');
        $client->alamat = $request->input('alamat');
        $client->kode = $kode;
        $client->save();

        return(redirect('/admin/client'));
    }

    public function get_client($id)
    {
        $client = Client::where('id_client', $id)->first();

        return response()->json($client);
    }

    public function list_client()
    {
        $client = Client::all();
        return view('admin::add-client', compact('client'));
    }

    public function update_client(Request $request)
    {
        $id_client = $request->input('id_client');
        $nama_client = $request->input('nama_client');
        $no_hp = $request->input('no_hp');
        $alamat=$request->input('alamat');
        DB::table('client')
            ->where('id_client', '=', $id_client)
            ->update(['nama_client' => $nama_client, 'no_hp' => $no_hp,'alamat' => $alamat]);


        return redirect('/admin/client');
    }
}
