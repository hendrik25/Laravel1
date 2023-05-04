<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nik',
        'name',
        'tempat_lahir',
        'tgl_lahir',
        'email',
        'level',
        'bagian',
        'no_hp'
    ];
}
