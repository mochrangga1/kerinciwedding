<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Client;
use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }
        return back()->with('loginError', 'Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard()
    {
        $total_client = Client::count();
        $total_undangan = Undangan::count();
        $client = Client::all();
        $data_undangan = new Undangan();
        $undangan = $data_undangan->list_undangan();
        return view('admin::dashboard', ['client' => $client, 'total_client' => $total_client, 'total_undangan' => $total_undangan, 'undangan' => $undangan]);
    }
}
