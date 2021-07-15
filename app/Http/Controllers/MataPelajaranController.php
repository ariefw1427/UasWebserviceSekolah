<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function tampil()
    {
        $mapel= MataPelajaran::all();
        return response()->json($mapel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'guru' => 'required',
            'kelas' => 'required',
            'materi' => 'required'
        ]);
        if($validate->passes()) {
            $mapel = MataPelajaran::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil Disimpan',
                'data' => $mapel

            ]); 
            return MataPelajaran::create($request->all());
        }
        return response()->json([
            'pesan' => 'Data Gagal Disimpan']);
    }


  

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request, mapel $mapel)
    {
        $mapel->update($request->all());
        return response()->json(['pesan' => 'Data berhasil diubah', 
        'data'=> $mapel]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function hapus($mapel)
    {
        $data = MataPelajaran::where('id', $mapel)->first();
        if (empty($data)){
            return response()->json(['pesan', 'Data tidak ditemukan'], 404);
        }
        $data->delete();
        return response()->json(['pesan'=> 'Data berhasil dihapus'],200);
    }
}
