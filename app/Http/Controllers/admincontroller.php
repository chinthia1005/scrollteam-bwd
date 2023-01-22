<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis;

class admincontroller extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function tabel(){
        $data=jenis::all();
        return view('admin.handphone.jenishandphone', compact('data'));
        
    }
}
