<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\PerusahaanRequest;
use App\Perusahaan;
use Carbon\Carbon;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.perusahaan', [
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
        return view('admin.perusahaan.create', [
            'perusahaan' => new Perusahaan()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerusahaanRequest $request)
    {
        //
        $perusahaan = $request->all();
        Perusahaan::create($perusahaan);
        return back()->with('success', 'Finish Add new perusahaan');
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
        return view('admin.perusahaan.edit', [
            'perusahaan' => Perusahaan::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerusahaanRequest $request, $id)
    {
        $perusahaan = $request->all();
        unset($perusahaan['_token']);
        unset($perusahaan['_method']);
        unset($perusahaan['action']);
        Perusahaan::where('id', $id)->update($perusahaan);
        return back()->with('success', 'Finish Update perusahaan');
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
        Perusahaan::findOrFail($id)->delete();
        return back()->with('success', 'Finsih Delete 1 Row');
    }

    public function getPlace()
    {
        return view('admin.perusahaan.getPlace', [
            'perusahaan' => Perusahaan::all()
        ]);
    }
    public function setPlace($id)
    {
        return view('admin.perusahaan.setPlace', [
            'perusahaan' => Perusahaan::findOrFail($id)
        ]);
    }
}
