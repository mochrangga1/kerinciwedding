<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Undangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $username = 'username';
    public function username()
    {
        return 'username';
    }
}
