<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function me(){
        $user = Auth::user();
        $roles = $user->getRoleNames();

        return view('auth.me')->with('page_title', 'Tài khoản của tôi')->with('user', $user)->with('role_name', $roles);
    }

    // Organization
    public function single_organization(){
        return view('pages.organization.single_organization')->with('page_title', 'Chi tiết tổ chức');
    }

    public function create_organization(){
        return view('pages.organization.create');
    }

    public function settings(){
        return view('pages.settings.settings')->with('page_title', 'Cài đặt');
    }
}
