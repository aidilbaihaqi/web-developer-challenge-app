<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    // Login
    public function viewLogin() {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request) {
        // Validasi
        $request->validate([
            'userID' => 'required|string',
            'pwd' => 'required'
        ]);

        // Kirim request ke API Login
        $response = Http::post('http://127.0.0.1:9871/api/login', [
            'userID' => $request->userID,
            'pwd' => $request->pwd
        ]);

        if($response->successful()) {
            $data = $response->json();

            // session(['token' => $data['token']]);

            session()->flash('success', 'Login berhasil');

            return redirect()->route('dashboard');
        }else {
            return back()->withErrors(['userID' => 'Periksa kembali user ID dan password anda']);
        }
    }

    // Dashboard
    public function index() {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
