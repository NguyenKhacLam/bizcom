<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Authentication
    public function login(){
        return view('pages.authentication.login');
    }

    public function dashboard(){
        return view('pages.dashboard')->with('page_title', 'Trang chủ');
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
