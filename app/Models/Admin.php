<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'nik';
    public $timestamps = true;

    protected $fillable = [
        'nik',
        'name',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'jenis_kelamin',
        'no_hp',
        'email',
        'alamat',
        'jabatan',
        'bagian',
        'tgl_masuk',
    ];


    /**
    * Get the user associated with the Admin
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function user(){
        return $this->hasOne('App\Models\User');
    }
    public function datacuti(){
        return $this->hasMany('App\Models\DataCuti');
    }
    public function cuti(){
        return $this->hasMany('App\Models\Cuti');
    }

}
