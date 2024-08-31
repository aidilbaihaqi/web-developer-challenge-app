<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    // Login

    // Dashboard
    public function index() {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
