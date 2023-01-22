<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pembeli;

class PembeliController extends Controller
{
    public function datapembeli () {
        $data=pembeli::all();
        return view('admin.pembeli.datapembeli', compact('data'));
    }
    public function tambahpembeli () {
        return view('admin.pembeli.tambahpembeli');
    }
    public function insertpembeli(request $request) {
    $data=pembeli::create([
        'No' => $request->No,
        'Nama_Pembeli' => $request->Nama_Pembeli,
        'Jenis_Handphone' => $request->Jenis_Handphone
    ]);
    return redirect('/datapembeli')->with('succes','Data Berhasil Di Tambahkan');
    }
}
