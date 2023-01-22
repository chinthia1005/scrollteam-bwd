<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis;

class jeniscontroller extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function tambahjenis(){
        return view('admin.handphone.tambahhandphone');
    }
    public function inserthandphone (request $request) {
        $this->validate($request,[
            'Jenis_Handphone' => 'required|min:3|max:10',
            'Fitur' => 'required',
            'Type' => 'required|min:2|max:10',
            'Harga' => 'required|min:7|max:15',
            'Kapasitas_Memory' => 'required',
            'Tahun_Rilis' => 'required|min:4|max:4',
            'Foto'=>'required|mimes:jpg,jpeg,png,webp',
        ],[
            'Jenis_Handphone.required' => 'Jenis handphone harus diisi',
            'Fitur.required' => 'Fitur harus dipilih',
            'Type.required' => 'Type harus diisi',
            'Harga.required' => 'Harga harus diisi',
            'Kapasitas_Memory.required' => 'Kapasitas Memory harus diisi',
            'Tahun_Rilis.required' => 'Tahun rilis harus diisi',
            'Foto.required' => 'Foto harus diisi',

            'Jenis_Handphone.min' => 'Jenis Handphone harus lebih dari 3 karakter',
            'Type.min' => 'Fitur harus lebih dari 2 karakter',
            'Harga.min' => 'Harga harus lebih dari 7 karakter',
            'Kapasitas_Memory.min' => 'Tambahkan keterangan GB pada kapasitas memory',
            'Tahun_Rilis.min' => 'Tahun rilis harus lebih dari 4 karakter',
            'Foto.mimes' => 'Foto harus diisi dengan format jpg,jpeg,png,webp',
        ]);
        $data=jenis::create([
            'Jenis_Handphone' => $request->Jenis_Handphone,
            'Fitur' => $request->Fitur,
            'Type' => $request->Type,
            'Harga' => $request->Harga,
            'Kapasitas_Memory' => $request->Kapasitas_Memory,
            'Tahun_Rilis' => $request->Tahun_Rilis,
            'Foto' => $request->Foto
        ]);
            if ($request->hasFile('Foto')) {
                $request->file('Foto')->move('fotohandphone', $request->file('Foto')->getClientOriginalName());
                $data->Foto = $request->file('Foto')->getClientOriginalName();
                $data->save();
            }
            // dd($data);
            return redirect('/tabel1')->with('succes','Data Berhasil Di Tambahkan');
        }

            public function tampilkandatahp($id){
                //dd($data);
               $data = jenis::find($id);

               return view('admin.handphone.tampildatahp', compact('data'));
           }
           public function updatejenis(Request $request, $id){

               $data = jenis::find($id);
               $data->update($request->all());

               return redirect('/tabel1')->with('success','Data Berhasil Di Update');
           }
           public function deletejenis(Request $request, $id){

               $data = jenis::find($id);
               $data->delete();

               return redirect('/tabel1')->with('success','Data Berhasil Di Hapus');
    }
}
