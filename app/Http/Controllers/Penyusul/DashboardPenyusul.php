<?php

namespace App\Http\Controllers\Penyusul;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPenyusul extends Controller
{
    public function index()
    {
        return view('pages.penyusul.dashboard');
    }
}
