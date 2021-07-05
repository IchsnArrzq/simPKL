<?php

namespace App\Http\Controllers;

use App\PembimbingSekolah;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class PembimbingSekolahController extends Controller
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

        PembimbingSekolah::where('id',$id)->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id,
            'perusahaan_id' => $request->perusahaan_id
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
    public function siswa()
    {
        $user = User::find(auth()->user()->id);
        return view('pembimbing_sekolah.siswa.index', [
            'siswa' => Siswa::where('pembimbing_sekolah_id', $user->pembimbing_sekolah->id)->paginate(10)
        ]);
    }
}
