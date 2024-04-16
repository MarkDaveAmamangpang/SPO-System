<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.admindashboard');
    }

    public function awards()
    {
        return view('admin.awards');
    }

    public function coaches()
    {
        return view('admin.coaches-accounts');
    }

    public function players()
    {
        return view('admin.player-accounts');
    }
}
