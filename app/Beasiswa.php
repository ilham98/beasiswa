<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'beasiswa';
    protected $fillable = ['nama', 'donatur', 'deskripsi', 'tanggal_buka', 'tanggal_tutup', 'kuota', 'ipk_min', 'syarat_ketentuan'];
    public $timestamps = false;

    public function jurusan() {
    	return $this->belongsToMany('App\Jurusan', 'beasiswa_jurusan', 'beasiswa_id', 'kode_jurusan');
    }

    public function mahasiswa() {
    	return $this->belongsToMany('App\Mahasiswa', 'beasiswa_mahasiswa', 'beasiswa_id', 'nim')->withPivot(['nim', 'no_ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_telepon_rumah', 'no_telepon_hp', 'asal_kabupaten', 'alamat_asal', 'alamat_sekarang', 'kode_program_studi', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'nama_bank', 'nomor_rekening', 'atas_nama', 'ipk_t', 'semester', 'status', 'konfirmasi', 'penghasilan_orang_tua', 'jumlah_tanggungan', 'tahun', 'tanggal_buat_berkas', 'tanggal_terima_berkas']);
    }

    public function dokumen() {
    	return $this->hasMany('App\Dokumen', 'beasiswa_id', 'id');
    }

    public function dokumen_mahasiswa() {
        return $this->belongsToMany('App\Mahasiswa', 'dokumen_mahasiswa', 'beasiswa_id', 'nim')->withPivot(['tipe', 'url']);
    }
}
