<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = "mata_pelajarans";
    protected $fillable = ['nama', 'kelas', 'guru', 'materi', 'created_at', 'updated_at'];
}
