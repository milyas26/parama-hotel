<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $auth = auth()->user()->role_id;
        return view('dashboard.pages.user.index', compact('users', 'auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()) {
            if(auth()->user()->role_id == 1) {
                $role = Role::all();
                return view('dashboard.pages.user.create', compact('role'));
            }else{
                return redirect('user')->with('error',"Sorry, can't access this page!");
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = User::createID();

        $email = $request->email;
        $checkEmail = User::where('email','=', $email)->first();

        if($checkEmail) {
            return redirect()->back()->with('warning','Email has been used!');
        } else {
            $user = new User;
            $user->id = $uuid;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->role_id = $request->role_id;

            // Generate Password
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $length = 8;
            $generate = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
            $password = Hash::make($generate);
            $user->password = $password;
    
            $user->save();
    
            $collection = collect([
                'generate' => $generate,
                'user' => $user
            ]);
    
            Mail::to($request->email)->send(new SendPassword($collection));
        }

        return redirect('user')->with('success','Add Data Successfully');
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
        return view('dashboard.pages.user.edit');
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
        //
    }
}
