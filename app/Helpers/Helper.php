<?php

function getSyaratDokumen() {
	return collect([
		[
			'id' => 1,
			'nama' => 'Slip Gaji Orang Tua'
		],
		[
			'id' => 2,
			'nama' => 'Surat keternagan tidak menerima SP dari jurusan'
		],
		[
			'id' => 3,
			'nama' => 'Transkip nilai'
		],
		[
			'id' => 4,
			'nama' => 'FC kartu keluarga'
		],
		[
			'id' => 5,
			'nama' => 'FC Slip SPP'
		],
		[
			'id' => 6,
			'nama' => 'FC Rekening bank'
		],
		[
			'id' => 7,
			'nama' => 'Surat keterangan tidak mampu'
		],
	]);
}

function getSyaratAdminDokumen() {
	return collect([
		[
			'id' => 8,
			'nama' => 'Surat Pernyataan tidak terlibat narkoba/obat-obatan terlarang dan lainnya'
		],
		[
			'id' => 9,
			'nama' => 'Formulir permohonan'
		],
		[
			'id' => 10,
			'nama' => 'Surat Pernyataan sedang tidak menerima beasiswa'
		]
	]);
}

function findSyaratDokumen($id) {
	$data = getSyaratDokumen()->first(function($s) use($id){
		return $s['id'] == $id;
	});
	
	return $data;
}

function findSyaratAdminDokumen($id) {
	$data = getSyaratAdminDokumen()->first(function($s) use($id){
		return $s['id'] == $id;
	});
	
	return $data;
}

function findStatus($id) {
	switch($id) {
		case 0:
			return 'Belum diproses';
		case 1:
			return 'Dalam diproses';
		case 2:
			return 'Diterima';
		case 3:
			return 'Tidak Diterima';
	}
}