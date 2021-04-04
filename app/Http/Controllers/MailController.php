<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateAccount;

class MailController extends Controller
{
    public function sendMail(){
        $user = User::find(1);
        Mail::to($user)->send(new CreateAccount($user, $user->password, 'Thông báo tạo mới tài khoản trên hệ thống '.env('APP_NAME')));
    }
}
