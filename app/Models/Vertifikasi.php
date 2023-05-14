<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vertifikasi extends Model
{
    use HasFactory;
    protected $table = 'vertifikasis';
    protected $primaryKey = 'id_vertif';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'id_cuti',
        'nik',
    ];


    /**
    * Get the user associated with the Admin
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function cuti(){
        return $this->belongsTo('App\Models\Cuti'. 'id');
    }
    public function datacuti(){
        return $this->belongsTo('App\Models\DataCuti', 'id_cuti');
    }
    public function admin(){
        return $this->belongsTo('App\Models\Admin', 'nik');
    }
}
