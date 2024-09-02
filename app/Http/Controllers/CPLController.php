<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CPLController extends Controller
{
    public function index() {
        $response = Http::withHeaders([
            'Authorization' => 'contohABC'
        ])->post('http://127.0.0.1:9871/api/listCPL', [
            'cpl' => 'list'
        ]);

        if($response->successful()) {
            $data = $response->json();
            return view('cpl', [
                'title' => 'Data CPL',
                'data' => $data
            ]);
        }
    }
}
