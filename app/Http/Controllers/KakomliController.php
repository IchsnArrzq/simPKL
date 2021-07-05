<?php

namespace App\Http\Controllers;

use App\{Jurusan,Kakomli,Laporan,PembimbingIndustri,PembimbingSekolah,Periode,Perusahaan,Rapot,Siswa,User};
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
        return view('home', [
            'kakomli' => User::findOrFail(auth()->user()->id)->kakomli,
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
        $this->validate($request, [
            'nama' => 'required|string',
            'jurusan_id' => 'required'
        ]);

        Kakomli::where('id',$id)->update([
            'nama' => $request->nama,
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
    public function siswa()
    {
        return view('kakomli.siswa.index',[
            'siswa' => Siswa::simplePaginate(10)
        ]);
    }
    public function pembimbing()
    {
        return view('kakomli.pembimbing.index',[
            'pembimbing_sekolah' => User::where('role', 'pembimbing_sekolah')->paginate(10),
            'pembimbing_industri' => User::where('role', 'pembimbing_industri')->paginate(10)
        ]);
    }
    public function siswa_pembimbing()
    {
        return view('kakomli.siswa.pembimbing',[
            'pembimbing_sekolah' => User::where('role', 'pembimbing_sekolah')->paginate(10),
            'pembimbing_industri' => User::where('role', 'pembimbing_industri')->paginate(10),
            'siswa' => Siswa::where('jurusan_id','!=',null)
                                ->where('pembimbing_sekolah_id',null)
                                ->paginate(10)
        ]);
    }
    public function pembimbing_show($id)
    {
        $pembimbing = User::find($id)->pembimbing_sekolah->id;
        return view('kakomli.pembimbing.show', [
            'user' => User::findOrFail($id),
            'siswa' => Siswa::where('pembimbing_sekolah_id',null)->paginate(10),
            'siswa_pembimbing' => Siswa::where('pembimbing_sekolah_id',$pembimbing)->paginate(10)
        ]);
    }
    public function pembimbing_update(Request $request,$id)
    {
        for ($i=0; $i < count($request->id); $i++) {
            Siswa::where('id',$request->id[$i])->update([
                'pembimbing_sekolah_id' => $id
            ]);
        }
        return back();
    }
    public function pembimbing_update_siswa(Request $request,$id)
    {
        for ($i=0; $i < count($request->id); $i++) {
            Siswa::where('id',$request->id[$i])->update([
                'pembimbing_sekolah_id' => null
            ]);
        }
        return back();
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
    public function laporan()
    {
        return view('kakomli.laporan.get',[
            'laporan' => Laporan::paginate(8)
        ]);
    }
    public function nilai()
    {
        return view('kakomli.nilai.get',[
            'nilai' => Rapot::all()
        ]);
    }
}
