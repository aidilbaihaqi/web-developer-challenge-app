<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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

            Session::put('userName', $data['userName']);
            Session::put('userPhoto', $data['userPhoto']);
            Session::put('userToken', $data['userToken']);
            Session::put('login', TRUE);

            return redirect()->route('dashboard');
        }else {
            return back()->with(['alert' => 'Periksa kembali user ID dan password anda']);
        }
    }
    public function logout() {
        Session::flush();
        return redirect()->route('viewlogin')->with('alert', 'Anda telah logout!');
    }

    // Dashboard
    public function index() {
        if(!Session::get('login')) {
            return redirect()->route('viewlogin')->with('alert', 'Ada kesalahan!');
        }else {
            return view('dashboard', [
                'title' => 'Dashboard'
            ]);
        }
    }
}
