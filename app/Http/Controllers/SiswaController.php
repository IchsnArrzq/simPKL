<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Jurnal, Laporan, Rapot, Sertifikat, Siswa, User};
use App\Imports\SiswaImport;
use App\Imports\UserImport;
use Exception;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.siswa.index', [
            'user' => User::where('role', 'siswa')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create', [
            'user' => new User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        $data = $request->all();
        $data['role'] = 'siswa';
        $data['password'] = Hash::make($data['password']);
        $resource = User::create($data);
        $resource->save();
        DB::beginTransaction();
        try {
            Siswa::create([
                'user_id' => $resource->id
            ]);
            DB::commit();
            return back()->with('success', $resource);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.siswa.show', [
            'user' => User::findOrFail($id)
        ]);
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
        return view('siswa.jurnal.get', [
            'jurnal' => Jurnal::where('siswa_id', User::find(auth()->user()->id)->siswa->id)->get()
        ]);
    }
    public function setJurnal()
    {
        return view('siswa.jurnal.set');
    }
    public function storeJurnal(Request $request)
    {
        $request = $request->all();
        $siswa = User::find(auth()->user()->id)->siswa;
        $request['siswa_id'] = $siswa->id;
        $request['jurusan_id'] = $siswa->jurusan_id;
        Jurnal::create($request);
        return back()->with('success', 'Berhasil Membuat Jurnal');
    }
    public function getLaporan()
    {
        return view('siswa.laporan.get', [
            'laporan' => Laporan::where('siswa_id', User::find(auth()->user()->id)->siswa->id)->get()
        ]);
    }
    public function storeLaporan(Request $request)
    {
        $this->validate($request, [
            'laporan' => 'required'
        ]);
        $ekstensi = ['application/pdf', 'application/msword'];
        $laporan = $request->file('laporan');
        if (in_array($laporan->getMimeType(), $ekstensi)) {
            $siswa = User::findOrFail(auth()->user()->id)->siswa;
            Laporan::create([
                'laporan' => $siswa->id . '_' . $laporan->getClientOriginalName(),
                'siswa_id' => $siswa->id
            ]);
            $laporan->move('laporanSiswa', $siswa->id . '_' . $laporan->getClientOriginalName());
            return back()->with('success', 'Berhasil Upload Laporan');
        } else {
            return back()->with('error', 'Ekstensi dilarang hanya word dan pdf saja');
        }
    }
    public function deleteLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);
        File::delete('laporanSiswa/' . $laporan->laporan);
        $laporan->delete();
        return back()->with('success', 'Berhasil Menghapus File');
    }
    public function getRapot()
    {
        return view('siswa.rapot.get', [
            'rapot' => Rapot::where('siswa_id', User::find(auth()->user()->id)->siswa->id)->get()
        ]);
    }
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        try {
            $file = $request->file('file');
            $name_file = rand().'_'.$file->getClientOriginalName();
            $file->move('excel', $name_file);
            Excel::import(new UserImport, public_path('excel/' . $name_file));
            Excel::import(new SiswaImport, public_path('excel/' . $name_file));
            return back()->with('success', 'Berhasil');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function getSertifikat()
    {
        if(User::find(auth()->user()->id)->siswa->sertifikat == null){
            return back()->with('error', 'sertifikat belum diberi');
        }else{
            return view('siswa.sertifikat.get',[
                'siswa' => User::find(auth()->user()->id)->siswa->sertifikat
            ]);
        }
    }
}
