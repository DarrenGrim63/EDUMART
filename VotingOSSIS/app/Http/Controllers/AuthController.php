<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'identifier' => 'required|string|unique:users,identifier',
            'password' => 'required|string|min:6',
            'role' => 'required|in:siswa,guru'
        ]);

        $user = User::create([
            'name' => $request->name,
            'identifier' => $request->identifier,
            'password' => Hash::make($request->password),
            'is_guru' => $request->role === 'guru'
        ]);

        session([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'identifier' => $user->identifier,
                'is_guru' => $user->is_guru,
                'has_voted' => $user->has_voted,
            ]
        ]);

        dd(session('user'));
        return redirect('/vote');
    }

    public function login(Request $request)
    {
        $user = User::where('identifier', $request->identifier)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'identifier' => $user->identifier,
                    'is_guru' => $user->is_guru,
                    'has_voted' => $user->has_voted,
                ]
            ]);

            // Dump isi session untuk debug
            // dd(session('user'));

            return redirect('/vote');
        }

        return redirect('/')->with('error', 'Login gagal. Cek NISN/NIK dan password.');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }
}
