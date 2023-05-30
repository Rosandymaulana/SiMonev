<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusUsulanController extends Controller
{
    public function index()
    {
        return view('pages.penyusul.status-usulan');
    }
}
