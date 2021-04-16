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
            ->join('user_organization', 'user_organization.user_id', '=', 'users.id')
            ->join('organizations', 'user_organization.organization_id', '=', 'organizations.id')
            ->where('users.id', '=', $user->id)
            ->whereNull('organizations.parent_id')
            ->select('organizations.id', 'organizations.uk', 'organizations.name', 'organizations.short_name', 'organizations.description', 'organizations.avatar', 'organizations.banner')
            ->get();
        return view('pages.dashboard')->with('page_title', 'Trang chủ')->with('organizations', $organizations);
    }


    public function showChild($uk)
    {
        $cur_or = DB::table('organizations')->where('uk','=',$uk)->first();
        $organizations =
            DB::table('organizations')
            ->where('parent_id','=', $cur_or->id)
            ->get();
        return view('pages.organization.child')->with('page_title', 'Tổ chức con')->with('organizations', $organizations);
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
            ->join('user_organization', 'user_organization.user_id', '=', 'users.id')
            ->join('organizations', 'user_organization.organization_id', '=', 'organizations.id')
            ->where('users.id', '=', $user->id)
            ->select('organizations.id', 'organizations.uk', 'organizations.name', 'organizations.short_name', 'organizations.description', 'organizations.avatar', 'organizations.banner')
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
            'description' => 'required|string',
            // 'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            // 'banner' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if($validator->fails()){
            $messages = $validator->messages();
            dd($messages);
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
        $organization->description = $request->input('description');
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

        // Save to user_organization
        $organization->save();

        $user_organization = new OrganizationUser();
        $user_organization->user_id = Auth::user()->id;
        $user_organization->organization_id = $organization->id;

        $user_organization->save();

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
        $user = Auth::user();
        $organizations =
            DB::table('users')
            ->join('user_organization', 'user_organization.user_id', '=', 'users.id')
            ->join('organizations', 'user_organization.organization_id', '=', 'organizations.id')
            ->where('users.id', '=', $user->id)
            ->select('organizations.id', 'organizations.uk', 'organizations.name', 'organizations.short_name', 'organizations.description', 'organizations.avatar', 'organizations.banner')
            ->get();

        $organization = DB::table('organizations')->where('uk','=', $uk)->first();
        return view('pages.organization.update')->with('page_title', 'Chỉnh sửa thông tin')->with('organization', $organization)->with('organizations', $organizations);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'short_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:12',
            'founding' => 'required',
            'address' => 'required',
            'rep_by' => 'required|string',
            'business' => 'required|string',
            'description' => 'required|string',
            // 'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            // 'banner' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if($validator->fails()){
            $messages = $validator->messages();
            return redirect('/organization/create')->withErrors($messages);
        }
        $organization = Organization::where('uk','=', $uk)->first();

        $request->input('name') && $organization->name = $request->input('name');
        $request->input('short_name') && $organization->short_name = $request->input('short_name');
        $request->input('description') && $organization->description = $request->input('description');
        $request->input('address') && $organization->address = $request->input('address');
        $request->input('phone') && $organization->phone = $request->input('phone');
        $request->input('email') && $organization->email = $request->input('email');
        $request->input('website') && $organization->website = $request->input('website');
        $request->input('founding') && $organization->founding = $request->input('founding');
        $request->input('rep_by') && $organization->rep_by = $request->input('rep_by');
        $request->input('business') && $organization->business = $request->input('business');
        $request->input('parent_id') && $organization->parent_id = $request->input('parent_id');

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

        $organization->save();

        return redirect('/');
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
