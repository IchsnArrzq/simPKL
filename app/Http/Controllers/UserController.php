<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Student;
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
            'user' => User::paginate(10)
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
        $nis = $request['password'];
        $request['password'] = Hash::make($request['password']);
        User::create($request);

        $students = User::where('email',$request['email'])->get();
        foreach($students as $student){
            $user_id = $student->id;
        }
        if ($request['role'] === 'Siswa') {
            Student::create([
                'nis' => $nis,
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
        //
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
        $find->student()->where('user_id',$id)->delete();
        $find->delete();
        return back()->with('success', 'Berhasil Menghapus Row');
    }
    public function role($data)
    {
        if ($data == 'all') {
            return redirect()->route('menu.admin.account.index');
        }
        return view('admin.user', [
            'user' => User::where('role', $data)->get()
        ]);
    }
}
