<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Pembimbing;
use App\Periode;
use App\Perusahaan;
use App\Rapot;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembimbing =  Pembimbing::where('user_id',auth()->user()->id)->get();
        foreach($pembimbing as $data){
            $id = $data->id;
        }
        return view('pembimbing.profile.index', [
            'pembimbing' => Pembimbing::findOrFail($id),
            'perusahaan' => Perusahaan::all(),
            'jurusan' => Jurusan::all(),
            'periode' => Periode::all()
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
        Pembimbing::where('id',$id)->update([
            'nama' => $request->nama,
            'periode_id' => $request->periode_id,
            'jurusan_id' => $request->jurusan_id,
            'perusahaan_id' => $request->periode_id
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
        $id = User::find(auth()->user()->id)->pembimbing->id;
        return view('pembimbing.siswa.index', [
            'siswa' => Siswa::where('pembimbing_id',$id)->paginate(8)
        ]);
    }
    public function getKompetensi($id)
    {

        return view('pembimbing.siswa.kompetensi',[
            'nilai' => Siswa::where('pembimbing_id',User::find(auth()->user()->id)->pembimbing->id)->paginate(8)
        ]);
    }
    public function getKedisiplinan($id)
    {

        return view('pembimbing.siswa.kedisiplinan',[
            'nilai' => Siswa::where('pembimbing_id',User::find(auth()->user()->id)->pembimbing->id)->paginate(8)
        ]);
    }
    public function getSikap($id)
    {

        return view('pembimbing.siswa.sikap',[
            // 'nilai' => Siswa::where('pembimbing_id',User::find(auth()->user()->id)->pembimbing->id)->paginate(8)
            'nilai' => Rapot::where('siswa_id',$id)->get()
        ]);
    }
    public function setKompetensi(Request $request,$id)
    {
        $this->validate($request,[
            'nilai' => 'required'
        ]);
        Rapot::where('siswa_id',$id)->update([
            'kompetensi' => $request->nilai
        ]);
        return back()->with('success','Berhasil Mengupdate Nilai');
    }
    public function setKedisiplinan(Request $request,$id)
    {
        $this->validate($request,[
            'nilai' => 'required'
        ]);
        Rapot::where('siswa_id',$id)->update([
            'kedisiplinan' => $request->nilai
        ]);
        return back()->with('success','Berhasil Mengupdate Nilai');
    }
    public function setSikap(Request $request,$id)
    {
        $this->validate($request,[
            'nilai' => 'required'
        ]);
        Rapot::where('siswa_id',$id)->update([
            'sikap' => $request->nilai
        ]);
        return back()->with('success','Berhasil Mengupdate Nilai');
    }

}
