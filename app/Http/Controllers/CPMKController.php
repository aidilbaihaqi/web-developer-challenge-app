<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CPMKController extends Controller
{
    public function index() {
        $response = Http::withHeaders([
            'Authorization' => Session::get('userToken')
        ])->post('http://127.0.0.1:9871/api/listCPMK', [
            'cpmk' => 'list'
        ]);

        $kodecpl = Http::withHeaders([
            'Authorization' => Session::get('userToken')
        ])->post('http://127.0.0.1:9871/api/listCPL', [
            'cpl' => 'list'
        ]);

        if($response->successful()) {
            $data = $response->json();
            $listKodeCPL = $kodecpl->json();
            return view('cpmk', [
                'title' => 'Data CPMK',
                'data' => $data,
                'kodecpl' => $listKodeCPL
            ]);
        }
    }
    public function store(Request $request) {
        $request->validate([
            'kodecpmk' => 'required',
            'kodecpl' => 'required',
            'deskripsi' => 'required'
        ]);
        
        $response = Http::withHeaders([
            'Authorization' => Session::get('userToken')
        ])->post('http://127.0.0.1:9871/api/addCPMK', [
            'kodecpmk' => $request->kodecpmk,
            'kodecpl' => $request->kodecpl,
            'deskripsi' => $request->deskripsi
        ]);

        if($response->successful()) {
            return redirect()->route('cpmk.index')->with(['success' => 'Data berhasil ditambahkan']);
        }
    }
}
