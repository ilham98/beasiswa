<?php

namespace App\Http\Controllers\Mahasiswa;
use App\Beasiswa;
use App\Jurusan;
use App\Mahasiswa;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BeasiswaController extends Controller
{

    public function __construct() {
        $this->nim = null;
    }

    public function index() {
        $beasiswa = Beasiswa::whereDoesntHave('mahasiswa', function($query) {
            $query->where('mahasiswa.nim', Auth::user()->mahasiswa->nim)
                ->where('beasiswa_mahasiswa.konfirmasi', 1);
        })->orderBy('tanggal_buka', 'desc');
        $mahasiswa_jurusan = Auth::user()->mahasiswa->program_studi->jurusan->kode;
        $beasiswa = $beasiswa->where(function($query) use($mahasiswa_jurusan){
            $query->doesntHave('jurusan')->orWhereHas('jurusan', function($query) use($mahasiswa_jurusan){
                $query->where('kode_jurusan', $mahasiswa_jurusan);
            });
        });
        $beasiswa->where('tanggal_buka', '<=', date('Y-m-d'));
        $beasiswa->where('tanggal_tutup', '>=', date('Y-m-d'));
        $beasiswa = $beasiswa->paginate(20);
    	return view('mahasiswa.beasiswa.index', compact('beasiswa'));
    }

    public function index2() {
        $beasiswa = Beasiswa::whereHas('mahasiswa', function($query) {
            $query->where('mahasiswa.nim', Auth::user()->mahasiswa->nim)
                ->where('beasiswa_mahasiswa.konfirmasi', 1);
        })->orderBy('tanggal_buka', 'desc');
        $mahasiswa_jurusan = Auth::user()->mahasiswa->program_studi->jurusan->kode;
        $beasiswa = $beasiswa->where(function($query) use($mahasiswa_jurusan){
            $query->doesntHave('jurusan')->orWhereHas('jurusan', function($query) use($mahasiswa_jurusan){
                $query->where('kode_jurusan', $mahasiswa_jurusan);
            });
        });
        $beasiswa = $beasiswa->paginate(20);
        return view('mahasiswa.beasiswa.index2', compact('beasiswa'));
    }

    public function create() {
        $jurusan = Jurusan::all();
    	return view('mahasiswa.beasiswa.create', compact('jurusan'));
    }

    public function show($id) {
        $program_studi = \App\ProgramStudi::all();
        $beasiswa = Beasiswa::find($id);
        $this->beasiswa_id = $id;
        $jurusan = $beasiswa->jurusan->map(function($j) {
            return $j->nama;
        })->all();
        $data_diri = null;
        $orang_tua = null;
        $bank = null;
        $apa_sudah_diajukan = Mahasiswa::find(Auth::user()->mahasiswa->nim)->beasiswa()->where('beasiswa.id', $id)->exists();
        $dokumen_mahasiswa = $beasiswa->dokumen_mahasiswa()->where('mahasiswa.nim', Auth::user()->mahasiswa->nim)->get();
        if($apa_sudah_diajukan) {
            $mahasiswa = Mahasiswa::find(Auth::user()->mahasiswa->nim)->beasiswa()->where('beasiswa.id', $id)->first();
            $data_diri = $mahasiswa->pivot;
        }
        return view('mahasiswa.beasiswa.single', compact('beasiswa', 'jurusan', 'program_studi', 'apa_sudah_diajukan', 'data_diri', 'dokumen_mahasiswa'));
    }

    public function edit($id) {
        $jurusan = Jurusan::all();
        $beasiswa = Beasiswa::find($id);
        $checked_jurusan = $beasiswa->jurusan->map(function($j) {
            return $j->kode;
        })->all();
    	return view('mahasiswa.beasiswa.edit', compact('beasiswa', 'jurusan', 'checked_jurusan'));
    }

    public function store(Request $request) {
        $beasiswa = Beasiswa::create($request->all());
        $jurusan = $beasiswa->jurusan()->attach($request->jurusan);
        return redirect('/a/beasiswa')->with('insert-success', 1);
    }

    public function update($id, Request $request) {
        $mahasiswa = Auth::user()->mahasiswa;
        $request->validate([
            'nim' => 'required|numeric|digits:8|unique:mahasiswa,nim,'.$mahasiswa->nim.',nim',
            'no_ktp' => 'required|numeric|digits:16|unique:mahasiswa,no_ktp,'.$mahasiswa->no_ktp.',no_ktp',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon_hp' => 'required|numeric',
            'no_telepon_rumah' => 'nullable|numeric',
            'asal_kabupaten' => 'required',
            'alamat_asal' => 'required',
            'alamat_sekarang' => 'required',
            'kode_program_studi' => 'required',
            'nomor_rekening' => 'nullable|numeric',
            'ipk_t' => 'nullable|numeric|min:1|max:4',
            'semester' => 'nullable|integer|min:1|max:12',
            'penghasilan_orang_tua' => 'nullable|integer|min:0',
            'jumlah_tanggungan' => 'nullable|integer|min:1'
        ]);

        $mahasiswa->beasiswa()->where('id', $id)->sync([$id => $request->except('_method', '_token')]);
        return redirect(url()->previous())->with('update-success', 1);
    }

    public function destroy($id) {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->delete();

        return redirect('/a/beasiswa');
    }

    public function ajukan($id) {
        $mahasiswa = Auth::user()->mahasiswa;
        $mahasiswa->beasiswa()->attach([$id => ['konfirmasi' => 0]]);

        return redirect(url()->previous())->with('ajukan-success', 1);        
    }

    public function batalkan_pengajuan($id) {
        $mahasiswa = Auth::user()->mahasiswa;
        $mahasiswa->beasiswa()->detach($id);

        return redirect(url()->previous());        
    }

    public function sinkronisasi($id) {
        $mahasiswa = Auth::user()->mahasiswa;
        $orang_tua = $mahasiswa->has('orang_tua')->exists() ?
                         collect($mahasiswa->orang_tua)->except('id') : [];
        if($mahasiswa->orang_tua) {
            $orang_tua['penghasilan_orang_tua'] = $orang_tua['penghasilan_ayah'] + $orang_tua['penghasilan_ibu'];
            $orang_tua = $orang_tua->except('penghasilan_ayah', 'penghasilan_ibu');
        } 

        $orang_tua = $orang_tua->all();
        $bank = $mahasiswa->has('bank')->exists() ?
                         collect($mahasiswa->bank)->except('id')->all() : [];
        $mahasiswa_data = collect($mahasiswa->toArray())->except('user_id', 'orang_tua', 'bank', 'ktm_url')->all();
        $ipk = $mahasiswa->ipk()->select(DB::raw("count(nilai) as c"), DB::raw("avg(nilai) as t"))->where('nilai', '<>', null)->first();
        $akademik = ['ipk_t' => $ipk->t, 'semester' => $ipk->c];
        $data = array_merge($mahasiswa_data, $orang_tua, $bank, $akademik);
        $mahasiswa->beasiswa()->sync([$id => $data]);

        return redirect(url()->previous());  
    }

    public function konfirmasi($id, Request $request) {
        $mahasiswa = Auth::user()->mahasiswa;
        $request->validate([
            'nim' => 'required|numeric|digits:8|unique:mahasiswa,nim,'.$mahasiswa->nim.',nim',
            'no_ktp' => 'required|numeric|digits:16|unique:mahasiswa,no_ktp,'.$mahasiswa->no_ktp.',no_ktp',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon_hp' => 'required|numeric',
            'no_telepon_rumah' => 'nullable|numeric',
            'asal_kabupaten' => 'required',
            'alamat_asal' => 'required',
            'alamat_sekarang' => 'required',
            'kode_program_studi' => 'required',
            'nomor_rekening' => 'required|numeric',
            'ipk_t' => 'required|numeric|min:1|max:4',
            'semester' => 'required|integer|min:1|max:12',
            'penghasilan_orang_tua' => 'required|integer|min:0',
            'jumlah_tanggungan' => 'required|integer|min:1',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_orang_tua' => 'required',
            'jumlah_tanggungan' => 'required',
            'nama_bank' => 'required',
            'atas_nama' => 'required'
        ]);
        try {
            $doc = $mahasiswa->dokumen_mahasiswa()->where('beasiswa_id', $id)->get()->count();
            if($doc < 7) {
                throw new \Exception("Dokumen belum lengkap", 1);
            }
            $mahasiswa = Auth::user()->mahasiswa;
            if(!$mahasiswa->ktm_url)
                throw new \Exception("KTM belum diupload", 1);
            $mahasiswa->beasiswa()->sync([$id => ['konfirmasi' => 1, 'tahun' => date('Y'), 'tanggal_buat_berkas' => date('Y-m-d')]]);
        } catch (\Exception $e) {
            return redirect(url()->previous())->with('error', $e->getMessage()); 
        }
        

        return redirect(url()->previous());  
    }

    public function dokumen_store($id, Request $request) {
        $mahasiswa = Auth::user()->mahasiswa;
        $request->validate([
            'tipe' => 'required',
            'file' => 'required|mimes:pdf'
        ]);
        if($mahasiswa->dokumen_mahasiswa()->where(['dokumen_mahasiswa.tipe' => $request->tipe, 'beasiswa_id' => $id ])->exists())
            return redirect(url()->previous())->with('error', 'Tipe dokumen yang sama telah ditambahkan sebelumnya');
        $file = $this->fileHandler($request->file);
        $body = [
            'tipe' => $request->tipe,
            'url' => $file['path']
        ];

        $mahasiswa->dokumen_mahasiswa()
            ->attach([$id => $body]);
        return redirect(url()->previous())->with('success', 'Dokumen berhasil ditambahkan');;
    }

    public function dokumen_delete($id, $tipe, Request $request) {
         $mahasiswa = Auth::user()->mahasiswa;
         $mahasiswa->dokumen_mahasiswa()
            ->wherePivot('tipe', $tipe)
            ->wherePivot('beasiswa_id', $id)
            ->detach();
        return redirect(url()->previous());
    }

    public function fileHandler($file, $directory = 'dokumen_mahasiswa') {
        $originalName = $file->getClientOriginalName();
        $arrayOfName = explode('.', $originalName);
        $name = uniqid().'.'.$arrayOfName[count($arrayOfName)-1];
        $path = '/uploads/'.$directory.'/'.$name;
        // $path = $directory;
        Storage::disk('public_uploads')->putFileAs($directory, $file, $name);
        return [ 'path' => $path,  'name' => $name];
    }
}
