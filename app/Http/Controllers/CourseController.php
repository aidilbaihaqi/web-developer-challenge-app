<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public function index() {
        $response = Http::withHeaders([
            'Authorization' => Session::get('userToken')
        ])->post('http://127.0.0.1:9871/api/listCourse', [
            'mk' => 'list'
        ]);

        if($response->successful()) {
            $data = $response->json();
            return view('mk', [
                'title' => 'Data Mata Kuliah',
                'data' => $data
            ]);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'kodemk' => 'required',
            'namamk' => 'required',
            'sks' => 'required'
        ]);

        $response = Http::withHeaders([
            'Authorization' => Session::get('userToken')
        ])->post('http://127.0.0.1:9871/api/addCourse', [
            'kodemk' => $request->kodemk,
            'namamk' => $request->namamk,
            'sks' => $request->sks
        ]);

        if($response->successful()) {
            return redirect()->route('mk.index')->with(['success' => 'Data berhasil ditambahkan']);
        }
    }
}
