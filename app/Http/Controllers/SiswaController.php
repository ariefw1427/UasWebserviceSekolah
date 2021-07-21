<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


use App\Siswa;



class SiswaController extends Controller
{
    public function tampil()
    {
        $siswa= Siswa::with('matapelajaran')->get();
        return response()->json($siswa);
    }

    public function show($siswa)
    {
        $siswa = Siswa::where('id', $siswa)->get();
        return response()->json($siswa);
    }
    public function data($siswa)
    {
        $siswa = Siswa::with('matapelajaran')->where('id', $siswa)->first();
        return response()->json($siswa);
        $data = Siswa::where('id', $siswa)->first();
        if (!empty($data)){
            return $data;
        }
        return response()->json(['pesan' => 'Data tidak ditemukan'], 404);
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
            'nis' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'mapel' => 'required',
            'agama' => 'required',
            'alamat' => 'required'
        ]);
        if($validate->passes()) {
            $siswa = Siswa::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil Disimpan',
                'data' => $siswa

            ]); 
            return Siswa::create($request->all());
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
    public function ubah(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());
        return response()->json(['pesan' => 'Data berhasil diubah', 
        'data'=> $siswa]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function hapus($siswa)
    {
        $data = Siswa::where('id', $siswa)->first();
        if (empty($data)){
            return response()->json(['pesan', 'Data tidak ditemukan'], 404);
        }
        $data->delete();
        return response()->json(['pesan'=> 'Data berhasil dihapus'],200);
    }
}
