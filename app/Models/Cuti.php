<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'cutis';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nik',
        'tgl_pengajuan',
        'nama_cuti',
        'jumlah_cuti',
        'tgl_awal',
        'tgl_akhir',
        'keterangan',
        'approval_kabag',
        'approval_manager',
        'vertifikasi_admin',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'nik', 'nik');
    }
    public function vertifikasi(){
        return $this->hasMany('App\Models\Vertifikasi', 'id_vertif');
    }
}
