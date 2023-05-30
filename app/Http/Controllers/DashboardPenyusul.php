<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPenyusul extends Controller
{
    public function index()
    {
        return view('pages.penyusul.dashboard');
    }
}
