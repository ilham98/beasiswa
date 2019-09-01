<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
	protected $primaryKey = 'nim';
	protected $table = 'mahasiswa';
	protected $fillable = ['nim', 'user_id', 'no_ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_telepon_rumah', 'no_telepon_hp', 'asal_kabupaten', 'alamat_asal', 'alamat_sekarang', 'kode_program_studi', 'ktm_url'];

	public $timestamps = false;

	public function beasiswa() {
		return $this->belongsToMany('App\Beasiswa', 'beasiswa_mahasiswa', 'nim', 'beasiswa_id')->withPivot(['nim', 'no_ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_telepon_rumah', 'no_telepon_hp', 'asal_kabupaten', 'alamat_asal', 'alamat_sekarang', 'kode_program_studi', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'nama_bank', 'nomor_rekening', 'atas_nama', 'ipk_t', 'semester', 'status', 'konfirmasi', 'penghasilan_orang_tua', 'jumlah_tanggungan', 'tahun', 'tanggal_buat_berkas', 'tanggal_terima_berkas']);
	}

	public function dokumen_mahasiswa() {
		return $this->belongsToMany('App\Beasiswa', 'dokumen_mahasiswa', 'nim', 'beasiswa_id')->withPivot(['url']);
	}

	public function orang_tua() {
		return $this->hasOne('App\OrangTua', 'nim', 'nim');
	}

	public function ipk() {
		return $this->hasMany('App\IPK', 'nim', 'nim');
	}

	public function bank() {
		return $this->hasOne('App\Bank', 'nim', 'nim');
	}

	public function program_studi() {
		return $this->belongsTo('App\ProgramStudi', 'kode_program_studi', 'kode');
	}
}
