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
    public function store(Request $request) {
        $request->validate([
            'kodecpl' => 'required',
            'deskripsi' => 'required'
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'contohABC'
        ])->post('http://127.0.0.1:9871/api/addCPL', [
            'kodecpl' => $request->kodecpl,
            'deskripsi' => $request->deskripsi
        ]);

        if($response->successful()) {
            return redirect()->route('cpl.index')->with(['success' => 'Data berhasil ditambahkan']);
        }
    }
    public function destroy(Request $request) {
        $request->validate([
            'kodecpl' => 'required'
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'contohABC'
        ])->post('http://127.0.0.1:9871/api/removeCPL', [
            'kodecpl' => $request->kodecpl
        ]);

        if($response->successful()) {
            return redirect()->route('cpl.index')->with(['success' => 'Data berhasil dihapus']);
        }else {
            return 'gagal';
        }
    }
}
