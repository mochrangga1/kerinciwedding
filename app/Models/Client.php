<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $table = 'client';
    protected $fillable = [
        'nama_client', 'no_hp', 'alamat', 'password', 'kode'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function whatsapp($id_client)
    {
        return Whatsapp::where('id_client', $id_client)->first();
    }

    public static function generateUniqueCode($length = 20)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $code = '';

        // Generate unique code
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Check uniqueness in the database
        while (self::where('kode', $code)->exists()) {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
        }

        return $code;
    }

    public function total_undangan($code)
    {
        return $this->join('undangan', 'undangan.id_client', '=', 'client.id_client')
                    ->where('client.kode', '=', $code)
                    ->count();
    }

    public function total_tamu($code)
    {
        return $this->join('undangan', 'undangan.id_client', '=', 'client.id_client')
                    ->join('tamu', 'tamu.id_undangan', '=', 'undangan.id_undangan')
                    ->where('client.kode','=', $code)
                    ->count();
    }
    public function isClient()
    {
        return true;
    }

    // Implementasi metode untuk otentikasi
    public function getAuthIdentifierName()
    {
        return 'id_client'; // Nama kolom ID pengguna
    }

    public function getAuthIdentifier()
    {
        return $this->getAttribute('id_client'); // Nilai ID pengguna
    }

    public function getAuthPassword()
    {
        return $this->getAttribute('password'); // Kata sandi di-hash
    }
}
