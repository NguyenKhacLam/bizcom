<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;

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
        return view('pages.users.index')->with('page_title', 'Nhân viên')->with('users', $users);
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
        return view('auth.me')->with('page_title', 'Tài khoản của tôi');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:12',
            'gender' => 'required',
            // 'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            // 'banner' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if($validator->fails()){
            $messages = $validator->messages();
            return redirect('/me')->withErrors($messages);
        }

        $user = User::where('id','=', $user_id)->first();
        $request->input('first_name') && $user->first_name = $request->input('first_name');
        $request->input('last_name') && $user->last_name = $request->input('last_name');
        $request->input('username') && $user->username = $request->input('username');
        $request->input('email') && $user->email = $request->input('email');
        $request->input('phone') && $user->phone = $request->input('phone');
        $request->input('address') && $user->address = $request->input('address');
        $request->input('gender') && $user->gender = $request->input('gender');
        $request->input('facebook') && $user->fb = $request->input('facebook');

        if ($avatar = $request->file('avatar')){
            $name = time().'_'.$avatar->getClientOriginalName();
            if($avatar->move('uploads', $name)){
                $user->avatar = $name;
            }
        }

        $user->save();

        return redirect('/me');
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
