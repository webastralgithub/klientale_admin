<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalSubscribedUser = User::where("is_subscribed",1)->count();
        return view('admin.dashboard', compact('totalUser','totalSubscribedUser'));
    }
}
