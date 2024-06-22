<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientAuthentication
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
        // Periksa apakah pengguna telah diautentikasi sebagai client
        if (auth('client')->check() && (auth('client')->user())->isClient()) {
            return $next($request);
        }

        // Jika tidak, alihkan ke halaman login untuk client
        return redirect()->route('loginClient');
    }
}
