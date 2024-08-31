<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    // Login
    public function login() {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    // Dashboard
    public function index() {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
