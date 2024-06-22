<?php

namespace Modules\Client\Http\Controllers;

use App\Models\Client;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class WhatsappController extends Controller
{
    public function pengaturan()
    {
        if (!Auth::guard('client')->check()) {
            return view('auth.client_login', compact('kode'));
        }

        $client = Auth::guard('client')->user();

        $client->no_hp = str_replace('0', '62', $client->no_hp);

        if (substr($client->no_hp, 0, 2) != '62') {
            $client->no_hp = '62' . substr($client->no_hp, 1);
        }

        $whatsapp = Whatsapp::where('id_client', $client->id_client)->first();

        return view('client::whatsapp', [
            'client' => $client->kode,
            'data_client' => $client,
            'whatsapp' => $whatsapp
        ]);
    }

    public function integrasi(Request $request)
    {
        $client = Auth::guard('client')->user();
        $session = Whatsapp::where('id_client', $client->id_client)->first();

        if ($session) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sesi WhatsApp sudah ada'
            ]);
        }

        $whatsapp = new Whatsapp([
            'id_client' => $client->id_client,
            'id_session' => $client->id_client,
        ]);
        $whatsapp->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesi WhatsApp berhasil disimpan'
        ]);
    }

    public function hapus_integrasi()
    {
        $client = Auth::guard('client')->user();
        $whatsapp = Whatsapp::where('id_client', $client->id_client)->first();

        if (!$whatsapp) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sesi WhatsApp tidak ditemukan'
            ]);
        }

        $whatsapp->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesi WhatsApp berhasil dihapus'
        ]);
    }
}
