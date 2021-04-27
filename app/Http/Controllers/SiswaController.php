<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurnalRequest;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Jurusan;
use App\User;
use App\Kakomli;
use App\Pembimbing;
use App\Jurnal;
use App\Laporan;
use App\Periode;
use App\Perusahaan;
use App\Rapot;
use App\Siswa;
use File;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.profile.index', [
            'siswa' => Siswa::find(User::find(auth()->user()->id)->siswa->id),
            'jurusan' => Jurusan::all(),
            'pembimbing' => Pembimbing::all(),
            'kakomli' => Kakomli::all(),
            'perusahaan' => Perusahaan::all()
        ]);
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
        $request = $request->all();
        unset($request['_token']);
        unset($request['_method']);
        unset($request['action']);
        $pembimbing = Pembimbing::findOrFail($request['pembimbing_id']);
        $request['periode_id'] = $pembimbing->periode_id;
        Siswa::where('id',$id)->update($request);
        return back()->with('success','Success Update Profile');
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
    public function getJurnal()
    {
        return view('siswa.jurnal.get',[
            'jurnal' => Jurnal::where('siswa_id',User::find(auth()->user()->id)->siswa->id)->get()
        ]);
    }
    public function setJurnal()
    {
        return view('siswa.jurnal.set');
    }
    public function storeJurnal(JurnalRequest $request)
    {
        $request = $request->all();
        $siswa = User::find(auth()->user()->id)->siswa;
        $request['siswa_id'] = $siswa->id;
        $request['jurusan_id'] = $siswa->jurusan_id;
        Jurnal::create($request);
        return back()->with('success','Berhasil Membuat Jurnal');
    }
    public function getLaporan()
    {
        return view('siswa.laporan.get',[
            'laporan' => Laporan::where('siswa_id',User::find(auth()->user()->id)->siswa->id)->get()
        ]);
    }
    public function storeLaporan(Request $request)
    {
        $this->validate($request,[
            'laporan' => 'required'
        ]);
        $ekstensi = ['application/pdf','application/msword'];
        $laporan = $request->file('laporan');
        if(in_array($laporan->getMimeType(),$ekstensi)){
            $siswa = User::findOrFail(auth()->user()->id)->siswa;
            Laporan::create([
                'laporan' => $siswa->id.'_'.$laporan->getClientOriginalName(),
                'siswa_id' => $siswa->id
            ]);
            $laporan->move('laporanSiswa',$siswa->id.'_'.$laporan->getClientOriginalName());
            return back()->with('success','Berhasil Upload Laporan');
        }else{
            return back()->with('error','Ekstensi dilarang hanya word dan pdf saja');
        }
    }
    public function deleteLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);
        File::delete('laporanSiswa/'.$laporan->laporan);
        $laporan->delete();
        return back()->with('success','Berhasil Menghapus File');
    }
    public function getRapot()
    {
        return view('siswa.rapot.get',[
            'rapot' => Rapot::where('siswa_id',User::find(auth()->user()->id)->siswa->id)->get()
        ]);
    }
}
