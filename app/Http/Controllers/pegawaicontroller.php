<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pegawai;

class pegawaicontroller extends Controller
{
    public function data () {
        $data=pegawai::all();
        return view('admin.PEGAWAI.tampilanpegawai', compact('data'));
    }
    public function tambahpegawai () {
        return view('admin.PEGAWAI.tambahpegawai');
    }
    public function insertpegawai (request $request) {
        $this->validate($request,[
            'Nama' => 'required|min:3|max:20',
            'No_Telepon' => 'required|min:11|max:12',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required|min:3|max:15',
            'Foto' => 'required|mimes:jpg,jpeg,png,webp',
        ],[
            'Nama.required' => 'Nama harus diisi',
            'No_Telepon.required' => 'No_Telepon harus diisi',
            'Jenis_Kelamin.required' => 'Jenis_Kelamin harus diisi',
            'Alamat.required' => 'Alamat harus diisi',
            'Foto.required' => 'Foto harus diisi',

            'Nama.min' => 'Nama harus lebih dari 3 karakter',
            'No_Telepon.min' => 'No_Telepon harus lebih dari 11 karakter',
            'Jenis_Kelamin.min' => 'Jenis_Kelamin harus dipilih',
            'Alamat.min' => 'Alamat harus lebih dari 3 karakter',
            'Foto.mimes' => 'Foto harus diisi dengan format jpg,jpeg,png,webp',
        ]);
        $data=pegawai::create([
            'Nama' => $request->Nama,
            'No_Telepon' => $request->No_Telepon,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'Alamat' => $request->Alamat,
            'Foto' => $request->Foto
        ]);
            if ($request->hasFile('Foto')) {
                $request->file('Foto')->move('fotopegawai/', $request->file('Foto')->getClientOriginalName());
                $data->Foto = $request->file('Foto')->getClientOriginalName();
                $data->save();
            }
            // dd($data);
            return redirect('/datapegawai')->with('success','Data Berhasil Di Tambahkan');
        }

            public function tampilkandatapegawai($id){

                $data = pegawai::find($id);
                //dd($data);

                return view('admin.PEGAWAI.tampildatapegawai', compact('data'));
            }
            public function updatepegawai(Request $request, $id){

                $data = pegawai::find($id);
                $data->update($request->all());

                return redirect('/datapegawai')->with('success','Data Berhasil Di Update');
            }
            public function deletepegawai(Request $request, $id){

                $data = pegawai::find($id);
                $data->delete();

                return redirect('/datapegawai')->with('success','Data Berhasil Di Hapus');
    }
}
