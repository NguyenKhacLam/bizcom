<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
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
    public function index($uk)
    {
        $user = Auth::user();
        $roles =
            DB::table('roles')
            ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('users', 'model_has_roles.model_id', '=', 'users.id')
            ->join('organization_user', 'organization_user.user_id', '=', 'users.id')
            ->join('organizations', 'organization_user.organization_id', '=', 'organizations.id')
            ->where('users.id', '=', $user->id)
            ->where('organizations.uk','=', $uk)
            ->select('roles.id', 'roles.name', 'roles.created_at', 'roles.updated_at')
            ->get();

        return view('pages.roles.index')->with('page_title', 'Chức vụ')->with('roles', $roles);
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
    public function show($uk, $role_id)
    {
        $permission =
            DB::table('roles')
            ->join("role_has_permissions", "role_has_permissions.role_id", '=', "roles.id")
            ->join("permissions", "role_has_permissions.permission_id", '=', "permissions.id")
            ->select('permissions.id', 'permissions.name')
            ->where('roles.id', '=', $role_id)
            ->get();

        return response()->json($permission);
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
