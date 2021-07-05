<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;
use App\Perusahaan;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.periode.index', [
            'periode' => Periode::latest()->get()
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
        return view('admin.periode.create', [
            'periode' => new Periode()
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
        $periode = $request->all();
        Periode::create($periode);
        return back()->with('success', 'Finish Add new periode');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perusahaan = Periode::findOrFail($id);
        return view('admin.periode.show', [
            'periode' => $perusahaan,
            'perusahaan' => Perusahaan::where('periode_id', $perusahaan->id)->latest()->get(),
            'perusahaan_null' => Perusahaan::where('periode_id', null)->latest()->get()
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
        return view('admin.periode.edit', [
            'periode' => Periode::findOrFail($id)
        ]);
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
        $periode = $request->all();
        unset($periode['_token']);
        unset($periode['_method']);
        unset($periode['action']);
        $periode['lama_waktu'] = $periode['selesai'];
        Periode::where('id', $id)->update($periode);
        return back()->with('success', 'Finish Update periode');
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
        Periode::findOrFail($id)->delete();
        return back()->with('success', 'Finsih Delete 1 Row');
    }
}
