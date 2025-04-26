<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $admin_id = UserType::where('name', 'admin')->first()->id;
        if (Auth::check()) {
            return view('dashboard', [
                'role' => UserType::find(Auth::user()->usertype_id)->name,
                'phone_number' => User::where('usertype_id', $admin_id)->first()->no_hp,
                'message' => '/chat jelaskan hukum perdata',
            ]);
        } else {
            return redirect('/login');
        }
    }
}
