<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswas";
    protected $fillable = ['nis', 'nama', 'jenis_kelamin', 'mapel', 'agama', 'alamat', 'matapelajaran_id', 'created_at', 'updated_at'];

    public function MataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, 'matapelajaran_id');
    }
}
