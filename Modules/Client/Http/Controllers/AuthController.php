<?php

namespace Modules\Client\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Renderable;

class AuthController extends Controller
{
    public function loginClient()
    {
        return view('auth.client_login');
    }

    public function clientAuth()
    {
        return view('auth.client_login');
    }

    public function clientAuthenticate(Request $request, string $kode)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);


        // Mencari client berdasarkan nama_client dan kode dari tabel Client
        $client = Client::where('username', $credentials['username'])
                    ->where('kode', $kode)
                    ->first();

        // Debugging data
        // Memeriksa keberadaan client dan kecocokan kata sandi
        if ($client && Hash::check($credentials['password'], $client->password)) {
            // Melakukan login manual
            Auth::guard('client')->login($client);
            $request->session()->regenerate();

            // Mengarahkan pengguna ke halaman dashboard khusus client
            return redirect()->route('clientDash', ['kode' => $client->kode]);
        }

        // Jika otentikasi gagal, kembali ke halaman login dengan pesan kesalahan
        return back()->with('loginError', 'Nama pengguna, kode, atau kata sandi salah');
    }
}
