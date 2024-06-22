<?php

namespace Modules\Client\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dash_client($kode)
    {
        if (!Auth::guard('client')->check()) {
            return view('auth.client_login', compact('kode'));
        }

        $data_client = Client::where('kode', $kode)->first();
        $client = $data_client->kode;
        $code = $kode;
        $client_id = new Client();
        $total_undangan = $client_id->total_undangan($code);
        $total_tamu = $client_id->total_tamu($code);
        // return($counter);
        return view('client::chart-client', compact('code','client','data_client','total_undangan', 'total_tamu'));
    }
}
