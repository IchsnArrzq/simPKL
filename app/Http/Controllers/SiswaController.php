<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Jurusan;
use App\Kakomli;
use App\Pembimbing;
use App\Jurnal;
use App\Periode;
use App\Siswa;

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
            'siswa' => Siswa::find(auth()->user()->id),
            'jurusan' => Jurusan::all(),
            'pembimbing' => Pembimbing::all(),
            'kakomli' => Kakomli::all()
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
        foreach ($pembimbing->periode as $data) {
            $request['periode_id'] = $data->id;
        }
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
            'jurnal' => Jurnal::where('siswa_id',auth()->user()->password)->get()
        ]);
    }
    public function setJurnal()
    {
        return view('siswa.jurnal.set');
    }
}
