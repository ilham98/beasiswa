<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('mahasiswa')->delete();
    	$mahasiswa = [
    		16615019 => [
    			'mhs' => [
    				'nama' => 'Amelia Putri Destama Sufma Kasmo',
    				'no_ktp' => '6472034612980003',
    				'tempat_lahir' => '',
    				'tanggal_lahir' => '',
    				'jenis_kelamin' => 'L',
    				'no_telepon_rumah' => '',
    				'no_telepon_hp' => 'asal_kabupaten',
    				'alamat_asal' => '',
    				'alamat_sekarang' => '',
    				'asal_kabupaten' => '',
    				'kode_program_studi' => '',
    				'user_id' => ''
    			],
    			'orang_tua' => [

    			]
    		]
    	]
    }
}
