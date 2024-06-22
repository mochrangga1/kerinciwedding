<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\Undangan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class ClientAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna saat ini telah diautentikasi dan merupakan pengguna client
        if (Auth::check() && Auth::user()->isClient()) {
            return $next($request);
        }

        // Jika bukan pengguna client, arahkan mereka ke halaman authclient
        return redirect('/authclient');
    
    }
    
    public function authenticate(Request $request): RedirectResponse
    {
       {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // Mencari pengguna berdasarkan nama pengguna dari tabel Client
        $client = Client::where('nama_pengguna', $credentials['username'])->first();

        // Memeriksa keberadaan pengguna dan kecocokan kata sandi
        if ($client && \Hash::check($credentials['password'], $client->password)) {
            // Melakukan login manual
            Auth::login($client);
            $request->session()->regenerate();

            // Mengarahkan pengguna ke halaman dashboard khusus client
            return redirect()->route('dash.client', ['kode' => $client->kode]);
        }

        // Jika otentikasi gagal, kembali ke halaman login dengan pesan kesalahan
        return back()->with('loginError', 'Login Gagal');
    }

    }
}
