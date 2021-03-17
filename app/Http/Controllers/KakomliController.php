<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Kakomli;
use App\Pembimbing;
use App\Periode;
use App\Perusahaan;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class KakomliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kakomli =  Kakomli::where('user_id',auth()->user()->id)->get();
        foreach($kakomli as $data){
            $id = $data->id;
        }
        return view('kakomli.profile.index', [
            'kakomli' => Kakomli::findOrFail($id),
            'jurusan' => Jurusan::all()
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
        //
        Kakomli::where('id',$id)->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jurusan_id' => $request->jurusan_id
        ]);
        return back()->with('success','Berhasil Mengupdate Profile');
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
    public function getSiswa()
    {
        return view('kakomli.siswa.get',[
            'siswa' => Siswa::simplePaginate(10),
            'pembimbing' => Pembimbing::all(),
            'periode' => Periode::all(),
            'perusahaan' => Perusahaan::all()
        ]);
    }
    public function getPeriode($id)
    {
        return view('kakomli.siswa.get',[
            'siswa' => Siswa::where('periode_id',$id)->simplePaginate(10),
            'pembimbing' => Pembimbing::all(),
            'periode' => Periode::all(),
            'perusahaan' => Perusahaan::all()
        ]);
    }
    public function getPembimbing($id)
    {
        return view('kakomli.siswa.get',[
            'siswa' => Siswa::where('pembimbing_id',$id)->simplePaginate(10),
            'pembimbing' => Pembimbing::all(),
            'periode' => Periode::all(),
            'perusahaan' => Perusahaan::all()
        ]);
    }
    public function getPerusahaan($id)
    {
        return view('kakomli.siswa.get',[
            'siswa' => Siswa::where('perusahaan_id',$id)->simplePaginate(10),
            'pembimbing' => Pembimbing::all(),
            'periode' => Periode::all(),
            'perusahaan' => Perusahaan::all()
        ]);
    }
}
