<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function register(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|unique|string',
            'password' => 'required|string|min:5|max:20',
            'passwordconfirm' => 'required|string|min:5|max:20',
            'avatar' => 'required|max:2048',
        ],[
            'firstname.required' => 'Your first name is required',
            'lastname.required' => 'Your last name is required',
            'email.required' => 'Your Email is required',
            'email.unique' => 'This email already exists',
            'password.required' => 'The password is required',
            'password.min' => 'Your password must contain between 5 and 20 cHaracters',
            'password.max' => 'Your password must contain between 5 and 20 cHaracters',
            'avatar.required' => 'The avatar is required',
            'avatar.max' => 'The maximum file upload size is 2M'
        ]);

        User::create([
        'firstname'=> $request->input('firstname'),
        'lastname'=> $request->input('lastname'),
        'email'=> $request->input('email'),
        'password'=> Hash::make($request->input('password')),
        'passwordconfirm'=> Hash::make($request->input('passwordconfirm')),
        'avatar'=> $request->input('avatar')
        ]);
        
        Session::put('message', 'User created successfully');
        //return redirect()->route('admin.categories.index')->with('message','Category Created Successfully');
    }

    //

    function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return ["error"=>"Email or password is not correct"];
        }
        return $user;
    }

    public function index()
    {
        //
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
