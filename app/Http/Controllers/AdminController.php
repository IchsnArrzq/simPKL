<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    public function user()
    {
        return view('admin.user',[
            'user' => User::all()
        ]);
    }
    public function company()
    {
        return view('admin.company',[
            'company' => Company::all()
        ]);
    }
}
