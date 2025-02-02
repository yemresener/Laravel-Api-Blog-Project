<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class AdminController extends Controller
{
    public function dashboard(){
        $unconfirm_post=Post::where('confirm',0)->count();
        $all_post=Post::all();
        $views=$all_post->sum('views');
        $users=User::get();
        return view('Admin.AdminDashboard', compact('users', 'unconfirm_post','views'));
    }

}
