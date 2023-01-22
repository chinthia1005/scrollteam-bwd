<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;

class suppliercontroller extends Controller
{
    public function datasupplier () {
        $data=supplier::all();
        return view('admin.supplier.datasupplier',compact('data'));
    }
    public function tambahsupplier () {
        return view('admin.supplier.tambahsupplier');
    }
    public function insertsupplier (Request $request) {
       $this->validate($request,[
            'nama_supplier' => 'required|min:7|max:20',
            'jenis_barang' => 'required',
            'fitur' => 'required|min:1|max:10',
            'harga_beli' => 'required|min:7|max:20',
            'jumlah_barang' => 'required|min:1|max:2',
            'harga_total' => 'required|min:7|max:20',
            'no_telp' => 'required|min:11|max:12',
            'alamat' => 'required|min:3|max:15',
        ],[
            'nama_supplier.required' => 'Nama supplier harus diisi',
            'jenis_barang.required' => 'Jenis barang harus diisi',
            'fitur.required' => 'Fitur harus diisi',
            'harga_beli.required' => 'Harga beli harus diisi',
            'jumlah_barang.required' => 'Jumlah barang harus diisi',
            'harga_total.required' => 'Harga Total harus diisi',
            'no_telp.required' => 'No telp harus diisi',
            'alamat.required' => 'Alamat harus diisi',

            'nama_supplier.min' => 'Nama supplier harus lebih dari 7 karakter',
            'jenis_barang.min' => 'pilih jenis barang',
            'fitur.min' => 'Fitur harus lebih dari 1 karakter',
            'harga_beli.min' => 'Harga beli harus lebih dari 7 karakter',
            'jumlah_barang.min' => 'Jumlah barang minimal 1',
            'harga_total.min' => 'Harga Total harus lebih dari 7 karakter',
            'no_telp.min' => 'No telp harus lebih dari 11 karakter',
            'alamat.min' => 'Alamat harus lebih dari 3 karakter',
        ]);
        $data=supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'jenis_barang' => $request->jenis_barang,
            'fitur' => $request->fitur,
            'harga_beli' => $request->harga_beli,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_total' => $request->harga_total,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);

        // dd($data);
        return redirect('/datasupplier')->with('success','Data Berhasil Di Tambahkan');
}
public function tampilkandata($id){
     //dd($data);
    $data = supplier::find($id);

    return view('admin.supplier.tampildata', compact('data'));
}
public function updatedata(Request $request, $id){

    $data = supplier::find($id);
    $data->update($request->all());

    return redirect('/datasupplier')->with('success','Data Berhasil Di Update');
}
public function deletedata(Request $request, $id){

    $data = supplier::find($id);
    $data->delete();

    return redirect('/datasupplier')->with('success','Data Berhasil Di Hapus');
}
}
