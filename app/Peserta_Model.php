<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Traits\Timestamp;

class Peserta_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = "tb_peserta";
    protected $primaryKey = "peserta_id";
    protected $fillable = [
        'peserta_id',
        'peserta_nama',
        'peserta_email',
        'peserta_nilai_x',
        'peserta_nilai_y',
        'peserta_nilai_z',
        'peserta_nilai_w'
    ];
}
