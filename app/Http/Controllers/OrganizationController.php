<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;
use App\Models\OrganizationUser;
use Validator;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $organizations =
            DB::table('users')
            ->join('organization_user', 'organization_user.user_id', '=', 'users.id')
            ->join('organizations', 'organization_user.organization_id', '=', 'organizations.id')
            ->where('users.id', '=', $user->id)
            ->select('organizations.id', 'organizations.uk', 'organizations.name', 'organizations.short_name', 'organizations.desc', 'organizations.avatar', 'organizations.banner')
            ->get();
        return view('pages.dashboard')->with('page_title', 'Trang chủ')->with('organizations', $organizations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $organizations =
            DB::table('users')
            ->join('organization_user', 'organization_user.user_id', '=', 'users.id')
            ->join('organizations', 'organization_user.organization_id', '=', 'organizations.id')
            ->where('users.id', '=', $user->id)
            ->select('organizations.id', 'organizations.uk', 'organizations.name', 'organizations.short_name', 'organizations.desc', 'organizations.avatar', 'organizations.banner')
            ->get();

        return view('pages.organization.create')->with('organizations', $organizations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'short_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:12',
            'founding' => 'required',
            'address' => 'required',
            'rep_by' => 'required|string',
            'business' => 'required|string',
            'desc' => 'required|string',
            'avatar' => 'required|image|mimes:jpg,png,jpeg',
            'banner' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if($validator->fails()){
            $messages = $validator->messages();
            return redirect('/organization/create')->withErrors($messages);
        }

        $organization = new Organization();

        $organization->name = $request->input('name');
        $organization->short_name = $request->input('short_name');
        $organization->email = $request->input('email');
        $organization->phone = $request->input('phone');
        $organization->website = $request->input('website');
        $organization->founding = $request->input('founding');
        $organization->address = $request->input('address');
        $organization->rep_by = $request->input('rep_by');
        $organization->business = $request->input('business');
        $organization->desc = $request->input('desc');
        $organization->parent_id = $request->input('parent_id');
        $organization->status = 'INIT';
        $organization->enable = 1;

        // File upload
        if ($banner = $request->file('banner')){
            $name = time().'_'.$banner->getClientOriginalName();
            if($banner->move('uploads', $name)){
                $organization->banner = $name;
            }
        }

        if ($avatar = $request->file('avatar')){
            $name = time().'_'.$avatar->getClientOriginalName();
            if($avatar->move('uploads', $name)){
                $organization->avatar = $name;
            }
        }

        // Save to organization_user
        $organization->save();

        $organization_user = new OrganizationUser();
        $organization_user->user_id = Auth::user()->id;
        $organization_user->organization_id = $organization->id;

        $organization_user->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uk)
    {
        // $organization = DB::table('organizations')->where('uk','=', $uk);
        return view('pages.organization.single_organization')->with('page_title', 'Chi tiết tổ chức');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uk)
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
    public function update(Request $request, $uk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uk)
    {
        //
    }
}
