<?php

namespace App\Http\Controllers;

use App\Jurnal;
use App\PembimbingIndustri;
use App\PembimbingSekolah;
use App\Perusahaan;
use App\Rapot;
use App\Sertifikat;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use File;
class PembimbingIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'jurusan_id' => 'required'
        ]);

        PembimbingIndustri::where('id', $id)->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id,
            'perusahaan_id' => $request->perusahaan_id
        ]);
        return back()->with('success', 'Berhasil Mengupdate Profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function siswa()
    {
        $user = User::find(auth()->user()->id);
        if ($user->pembimbing_industri->perusahaan->pembimbing_sekolah->first() == null) {
            Siswa::where('pembimbing_industri_id', $user->pembimbing_industri->id)->update([
                'pembimbing_industri_id' => null
            ]);
            return view('pembimbing_industri.siswa.index', [
                'siswa' => null,
                'perusahaan' => $user->pembimbing_industri->perusahaan->nama
            ]);
        } else {
            $no = $user->pembimbing_industri->perusahaan->pembimbing_sekolah->first();
            Siswa::where('pembimbing_sekolah_id', $no->id)->update([
                'pembimbing_industri_id' => $user->pembimbing_industri->id
            ]);
            return view('pembimbing_industri.siswa.index', [
                'siswa' => $no->siswa,
                'perusahaan' => $user->pembimbing_industri->perusahaan->nama
            ]);
        }
    }
    public function perusahaan()
    {
        return view('pembimbing_industri.perusahaan.index', [
            'perusahaan' => Perusahaan::paginate(10)
        ]);
    }
    public function jurnal($id)
    {
        return view('pembimbing_industri.jurnal.index', [
            'jurnal' => Jurnal::where('siswa_id', $id)->get()
        ]);
    }
    public function nilai($id)
    {
        $rapot = Siswa::find($id)->rapot;
        if ($rapot == null) {
            Rapot::create([
                'siswa_id' => $id
            ]);
            return view('pembimbing_industri.nilai.index', [
                'rapot' => $rapot,
                'siswa' => Siswa::find($id)->id
            ]);
        } else {
            return view('pembimbing_industri.nilai.index', [
                'rapot' => $rapot,
                'siswa' => Siswa::find($id)->id
            ]);
        }
    }
    public function nilai_update(Request $request, $id)
    {
        Rapot::where('siswa_id', $id)->update($request->except(['_token', '_method']));
        return back();
    }
    public function sertifikat($id)
    {
        return view('pembimbing_industri.sertifikat.index', [
            'siswa' => Siswa::find($id)
        ]);
    }
    public function sertifikat_store(Request $request, $id)
    {
        $this->validate($request, [
            'sertifikat' => 'required'
        ]);
        $ekstensi = ['application/pdf','image/png','image/jpg'];
        $sertifikat = $request->file('sertifikat');

        if (Siswa::find($id)->sertifikat) {
            if (in_array($sertifikat->getMimeType(), $ekstensi)) {
                $siswa = Siswa::findOrFail($id);
                $random = rand();
                File::delete('sertifikat/' . $siswa->sertifikat->judul);
                Sertifikat::where('siswa_id', $siswa->id)->update([
                    'judul' => $siswa->nama . '_' . $random . '_' . $sertifikat->getClientOriginalName(),
                    'siswa_id' => $siswa->id
                ]);

                $sertifikat->move('sertifikat', $siswa->nama . '_' . $random . '_' . $sertifikat->getClientOriginalName());
                return back()->with('success', 'Berhasil Upload sertifikat');
            } else {
                return back()->with('error', 'Ekstensi dilarang hanya png , jpg dan  pdf saja');
            }
        } else {
            if (in_array($sertifikat->getMimeType(), $ekstensi)) {
                $siswa = Siswa::findOrFail($id);
                $random = rand();
                echo $siswa->nama;
                Sertifikat::create([
                    'judul' => $siswa->nama . '_' . $random . '_' . $sertifikat->getClientOriginalName(),
                    'siswa_id' => $siswa->id
                ]);
                $sertifikat->move('sertifikat', $siswa->nama . '_' . $random . '_' . $sertifikat->getClientOriginalName());
                return back()->with('success', 'Berhasil Upload sertifikat');
            } else {
                return back()->with('error', 'Ekstensi dilarang hanya word dan pdf saja');
            }
        }
    }
    public function sertifikat_delete($id)
    {
        $user = Sertifikat::find($id);
        File::delete('sertifikat/' . $user->judul);
        $user->delete();
        return back();
    }
}
