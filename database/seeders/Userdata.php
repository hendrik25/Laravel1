<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\DataCuti;

class Userdata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nik'           => '20160900050',
                'username'      => 'admin',
                'password'      => bcrypt('12345'),
                'level'         => 'Admin',
            ],
        ];

        foreach($user as $key){
            User::create($key);
        }

        $admins = [
            [
                'nik'           => '20160900050',
                'name'          => 'Muhamad Hendrik Kurniawan',
                'tempat_lahir'  => 'Tangerang',
                'tgl_lahir'     => '1996-01-25',
                'agama'         => 'Islam',
                'jenis_kelamin' => 'Laki-Laki',
                'no_hp'         => '089999',
                'email'         => 'hendrik@gmail.com',
                'alamat'        => 'Pabuaran',
                'jabatan'       => 'Admin',
                'bagian'        => 'Development',
                'tgl_masuk'     => '2016-09-08',
            ],
        ];

        foreach($admins as $key2){
            Admin::create($key2);
        }

        // $cutis = [
        //     [
        //         'nik'           => '20160900050',
        //         'nama_cuti'     => 'Cuti Tahunan',
        //         'periode'       => '2022',
        //         'hak_cuti'      => '12',
        //         'cuti_diambil'  => '0',
        //         'sisa_cuti'     => '12',
        //     ],
        // ];

        // foreach($cutis as $key3){
        //     DataCuti::create($key3);
        // }
    }
}
