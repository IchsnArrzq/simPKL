<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\{Kakomli, Siswa, Pembimbing};
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.user', [
            'meanSiswa' => User::where('role', 'siswa')->get()->count(),
            'meanPpkl' => User::where('role', 'ppkl')->get()->count(),
            'meanKkp' => User::where('role', 'kkp')->get()->count(),
            'user' => User::simplePaginate(10)
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
    public function store(UserRequest $userRequest)
    {
        $request = $userRequest->all();
        $no = $request['password'];
        $request['password'] = Hash::make($request['password']);
        User::create($request);

        if ($request['role'] === 'siswa') {
            $students = User::where('email', $request['email'])->get();
            foreach ($students as $student) {
                $user_id = $student->id;
            }
            Siswa::create([
                'nis' => $no,
                'user_id' => $user_id
            ]);
        } elseif ($request['role'] === 'ppkl') {
            $pembimbingPkl = User::where('email', $request['email'])->get();
            foreach ($pembimbingPkl as $data) {
                $user_id = $data->id;
            }
            Pembimbing::create([
                'no_pembimbing' => $no,
                'user_id' => $user_id
            ]);
        } elseif ($request['role'] === 'kkk') {
            $ketua = User::where('email', $request['email'])->get();
            foreach ($ketua as $data) {
                $user_id = $data->id;
            }
            Kakomli::create([
                'no_kakomli' => $no,
                'user_id' => $user_id
            ]);
        }
        return back()->with('success', 'Berhasil Membuat User Baru');
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
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        unset($data['action']);
        unset($data['password_confirmation']);
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }
        // dd($data);
        User::where('id', $id)->update($data);
        return back()->with('success', 'Berhasil Mengupdate User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = User::findOrFail($id);
        if ($find->role == 'siswa') {
            $find->siswa()->where('user_id', $id)->delete();
        } elseif ($find->role == 'ppkl') {
            $find->pembimbing()->where('user_id', $id)->delete();
        } elseif ($find->role == 'kkk') {
            $find->kakomli()->where('user_id', $id)->delete();
        }
        $find->delete();
        return back()->with('success', 'Berhasil Menghapus Row');
    }
    public function role($data)
    {
        if ($data == 'all') {
            return redirect()->route('menu.admin.user.index');
        }
        return view('admin.user', [
            'meanSiswa' => User::where('role', 'siswa')->get()->count(),
            'meanPpkl' => User::where('role', 'ppkl')->get()->count(),
            'meanKkp' => User::where('role', 'kkp')->get()->count(),
            'user' => User::where('role', $data)->simplePaginate(10)
        ]);
    }
}
