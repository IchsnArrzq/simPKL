<?php

namespace App\Http\Controllers;

use App\{Kakomli, Siswa, Pembimbing, PembimbingIndustri, PembimbingSekolah, Rapot, User};
use App\Exports\UserExport;
use App\Imports\UserImport;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'user' => User::where('role', '!=', 'siswa')->simplePaginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', [
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
            'email' => 'required|unique:users|min:5',
            'password' => 'required',
            'role' => 'required|in:admin,kakomli,pembimbing_industri,pembimbing_sekolah'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        try {
            $resource = User::create($data);
            $resource->save();
            switch ($request->role) {
                case 'admin';
                    return back()->with('success', $resource->id);
                    break;
                case 'kakomli':
                    Kakomli::create([
                        'user_id' => $resource->id
                    ]);
                    break;
                case 'pembimbing_industri':
                    PembimbingIndustri::create([
                        'user_id' => $resource->id
                    ]);
                    break;
                case 'pembimbing_sekolah':
                    PembimbingSekolah::create([
                        'user_id' => $resource->id
                    ]);
                    break;
            }
            return back()->with('success', $resource);
        } catch (Exception $e) {
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
        return view('admin.user.edit', [
            'user' => User::findOrFail($id)
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
        $this->validate($request, [
            'email' => 'required|min:5',
            'password' => 'required',
            'role' => 'required|in:admin,kakomli,pembimbing_industri,pembimbing_sekolah'
        ]);

        $old = User::findOrFail($id);

        $new = $request->except(['_token', '_method', 'action']);
        $new['password'] = Hash::make($new['password']);

        dd($new['role'] === $old->role);
        // User::where('id', $id)->update($data);
        switch ($new['role']) {
            case 'admin';
                $data = User::where('id', $id)->update($new);
                if ($new['role'] === $old->role) {
                } else {

                }
                break;
            case 'kakomli':
                $data = User::where('id', $id)->update($new);
                if ($new['role'] === $old->role) {

                } else {

                }
                break;
            case 'pembimbing_industri':
                $data = User::where('id', $id)->update($new);
                if ($new['role'] === $old->role) {
                } else {
                }
                break;
            case 'pembimbing_sekolah':
                $data = User::where('id', $id)->update($new);
                if ($new['role'] === $old->role) {
                } else {
                }
                break;
        }

        // return back()->with('success', 'Berhasil Mengupdate User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        switch ($user->role) {
            case 'pembimbing_industri':
                $user->pembimbing_industri->delete();
                break;
            case 'pembimbing_sekolah':
                $user->pembimbing_sekolah->delete();
                break;
            case 'kakomli':
                $user->kakomli->delete();
                break;
            default:

                break;
        }
        $user->delete();
        return back()->with('success', 'Berhasil menghapus');
    }
    public function role($data)
    {
        if ($data == 'all') {
            return redirect()->route('menu.admin.user.index');
        }
        return view('admin.user.index', [
            'user' => User::where('role', $data)->simplePaginate(10)
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
            Excel::import(new UserImport, public_path('/excel/' . $name_file));
            return back()->with('success', 'Berhasil');
        } catch (QueryException $e) {
            return back()->with('error', $e);
        }
    }
    public function export()
    {
        return Excel::download(new UserExport, 'User.xlsx');
    }
}
