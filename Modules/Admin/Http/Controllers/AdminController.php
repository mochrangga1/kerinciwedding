<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    public function add_user(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:215', 'min:4'],
            'username' => ['required', 'min:4', 'max:215', 'unique:users', 'regex:/^[A-Za-z0-9]+$/'],
            'password' => ['required', 'min:5', 'max:255']
        ]);
        // dd($validated);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect('/admin/user');
    }

    public function show_user()
    {
        $user = User::all();
        return view('admin::add-user', compact('user'));
    }
}
