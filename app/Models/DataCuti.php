<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataCuti extends Model
{
    use HasFactory;
    protected $table = 'data_cutis';
    protected $primaryKey = 'id_cuti';
    public $timestamps = true;

    protected $fillable = [
        'nik',
        'nama_cuti',
        'periode',
        'hak_cuti',
        'cuti_diambil',
        'sisa_cuti',
    ];

    /**
     * Get the datacuti that owns the DataCuti
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
}
