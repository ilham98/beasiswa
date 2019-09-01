<?php

namespace App\Http\Controllers\Admin;

use App\Kriteria;
use App\Beasiswa;
use App\Rangking;
use App\Normalisasi;
use App\RangkingJurusan;
use App\NormalisasiJurusan;
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\ProgramStudi;
use App\Jurusan;
use App\Http\Controllers\Controller;
use PDF;

class PerangkinganController extends Controller
{
    public function index($id) {
        $mahasiswa_count = Beasiswa::find($id)->mahasiswa->count();

    	$mahasiswa = Rangking::where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get();
        $mahasiswa_jurusan = RangkingJurusan::where('beasiswa_id', $id)->orderBy('rangking', 'asc')->get()->groupBy('kode_jurusan');

    	return view('admin.beasiswa.perangkingan.index', compact('mahasiswa', 'mahasiswa_count', 'mahasiswa_jurusan', 'id'));
    }

    public function store($id) {
    	$beasiswa = Beasiswa::find($id);
    	$mahasiswa = $beasiswa->mahasiswa()->where('beasiswa_mahasiswa.konfirmasi', 1)->get()->toArray();
    	$mahasiswa_new = [];
    	$kriteria = Kriteria::all();
    	Normalisasi::where('beasiswa_id', $id)->delete();
    	foreach($mahasiswa as $i => $m) {
            $kode_jurusan = Mahasiswa::find($m['nim'])->program_studi->kode_jurusan;
    		array_push($mahasiswa_new, [
    			'kriteria_id' => 1,
    			'nim' => $m['nim'],
    			'beasiswa_id' => $id,
    			'nilai' => $m['pivot']['penghasilan_orang_tua'],
                'kode_jurusan' => $kode_jurusan
    		]); 

    		array_push($mahasiswa_new, [
    			'kriteria_id' => 2,
    			'nim' => $m['nim'],
    			'beasiswa_id' => $id,
    			'nilai' => $m['pivot']['semester'],
                'kode_jurusan' => $kode_jurusan
    		]);		

    		array_push($mahasiswa_new, [
    			'kriteria_id' => 3,
    			'nim' => $m['nim'],
    			'beasiswa_id' => $id,
    			'nilai' => $m['pivot']['jumlah_tanggungan'],
                'kode_jurusan' => $kode_jurusan
    		]);

    		array_push($mahasiswa_new, [
    			'kriteria_id' => 4,
    			'nim' => $m['nim'],
    			'beasiswa_id' => $id,
    			'nilai' => $m['pivot']['ipk_t'],
                'kode_jurusan' => $kode_jurusan
    		]);	
    	}
        
    	$mahasiswa_grouped_by_kriteia = collect($mahasiswa_new)->groupBy(function($mn) {
    		return $mn['kriteria_id'];
    	});

        $mahasiswa_grouped_by_kriteia_jurusan = collect($mahasiswa_new)->groupBy([
            'kode_jurusan',
            function($item) {
                return $item['kriteria_id'];
            }
        ]);

        //semua jurusan

    	$mahasiswa_nilai = [];
    	$mahasiswa_grouped_by_kriteia = $mahasiswa_grouped_by_kriteia->toArray();
    	foreach($mahasiswa_grouped_by_kriteia as $i => $mn) {
    		$tipe = $kriteria[$i - 1]->tipe;
			$min = collect($mahasiswa_grouped_by_kriteia[$i])->min('nilai');
    		$max = collect($mahasiswa_grouped_by_kriteia[$i])->max('nilai');

    		foreach($mn as $_i => $m) {
    			if($tipe == 'C') {
    				$nilai = $min/$mahasiswa_grouped_by_kriteia[$i][$_i]['nilai'];
	    			$mahasiswa_grouped_by_kriteia[$i][$_i]['nilai'] = $nilai;
    			} else {
    				$nilai = $mahasiswa_grouped_by_kriteia[$i][$_i]['nilai']/$max;
	    			$mahasiswa_grouped_by_kriteia[$i][$_i]['nilai'] = $nilai;
    			}
    		}	
    	}

    	foreach ($mahasiswa_grouped_by_kriteia as $m) {
    		foreach($m as $_m) {
    			Normalisasi::create([
    				'kriteria_id' => $_m['kriteria_id'],
    				'nim' => $_m['nim'],
    				'beasiswa_id' => $_m['beasiswa_id'],
    				'nilai' => $_m['nilai']
    			]);
    		}
    	}

    	$normalisasi = Normalisasi::with('kriteria')->where('beasiswa_id', $id)->get();
    	$normalisasi  = $normalisasi->groupBy('nim');
    	$rangking = [];
    	foreach($normalisasi as $i => $n) {
    		$nilai = 0;
    		foreach($n as $_n) {
    			$nilai = $nilai + ($_n->nilai * $_n->kriteria->bobot);
    		}
    		array_push($rangking, [
    			'nilai' => $nilai,
    			'rangking' => null,
    			'nim' => $i,
    			'beasiswa_id' => $id
    		]);
    	}	
        $x = 1;
    	foreach(collect($rangking)->sortByDesc('nilai') as $i => $r) {
    		$rangking[$i]['rangking'] = $x;
            $x++;
    	}

    	Rangking::where('beasiswa_id', $id)->delete();

    	foreach($rangking as $r) {
    		Rangking::create([
    			'nilai' => $r['nilai'],
    			'rangking' => $r['rangking'],
    			'nim' => $r['nim'],
    			'beasiswa_id' => $r['beasiswa_id']
    		]);
    	}





         //normalisasi jurusan


        NormalisasiJurusan::where('beasiswa_id', $id)->delete();
        RangkingJurusan::where('beasiswa_id', $id)->delete();
        $mahasiswa_nilai = [];
        foreach($mahasiswa_grouped_by_kriteia_jurusan as $kode_jurusan => $mahasiswa_grouped_by_kriteia) {
            $mahasiswa_grouped_by_kriteia = $mahasiswa_grouped_by_kriteia->toArray();
        foreach($mahasiswa_grouped_by_kriteia as $i => $mn) {
            $tipe = $kriteria[$i - 1]->tipe;
            $min = collect($mahasiswa_grouped_by_kriteia[$i])->min('nilai');
            $max = collect($mahasiswa_grouped_by_kriteia[$i])->max('nilai');

            foreach($mn as $_i => $m) {
                if($tipe == 'C') {
                    $nilai = $min/$mahasiswa_grouped_by_kriteia[$i][$_i]['nilai'];
                    $mahasiswa_grouped_by_kriteia[$i][$_i]['nilai'] = $nilai;
                } else {
                    $nilai = $mahasiswa_grouped_by_kriteia[$i][$_i]['nilai']/$max;
                    $mahasiswa_grouped_by_kriteia[$i][$_i]['nilai'] = $nilai;
                }
            }   
        }

        foreach ($mahasiswa_grouped_by_kriteia as $m) {
            foreach($m as $_m) {
                NormalisasiJurusan::create([
                    'kriteria_id' => $_m['kriteria_id'],
                    'nim' => $_m['nim'],
                    'beasiswa_id' => $_m['beasiswa_id'],
                    'nilai' => $_m['nilai'],
                    'kode_jurusan' => $kode_jurusan
                ]);
            }
        }

        $normalisasi = NormalisasiJurusan::with('kriteria')->where('beasiswa_id', $id)->where('kode_jurusan', $kode_jurusan)->get();
        $normalisasi  = $normalisasi->groupBy('nim');
        $rangking = [];
        foreach($normalisasi as $i => $n) {
            $nilai = 0;
            foreach($n as $_n) {
                    $nilai = $nilai + ($_n->nilai * $_n->kriteria->bobot);
                }


                array_push($rangking, [
                    'nilai' => $nilai,
                    'rangking' => null,
                    'nim' => $i,
                    'beasiswa_id' => $id,
                    'kode_jurusan' => $kode_jurusan
                ]);
            }   
            $x = 1;
            foreach(collect($rangking)->sortByDesc('nilai') as $i => $r) {
                $rangking[$i]['rangking'] = $x;
                $x++;
            }

            foreach($rangking as $r) {
                $r = RangkingJurusan::create([
                    'nilai' => $r['nilai'],
                    'rangking' => $r['rangking'],
                    'nim' => $r['nim'],
                    'beasiswa_id' => $r['beasiswa_id'],
                    'kode_jurusan' => $r['kode_jurusan']
                ]);
            }
        }

    	return redirect(url()->previous());
    }
}
