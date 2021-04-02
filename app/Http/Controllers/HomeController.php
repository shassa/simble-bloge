<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('userimage');
    }
    public function update(Request $request,$id)
    {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('img'), $imageName);
        $users=User::find($id);
        $users->name=$users->name;
        $users->email=$users->email;
        $users->password=$users->password;
        $users->image=$imageName;
        $users->save();
        return redirect('/');
    }
}
