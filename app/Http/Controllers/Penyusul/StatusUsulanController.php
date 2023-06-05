<?php

namespace App\Http\Controllers\Penyusul;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Usulan;
use Illuminate\Http\Request;

class StatusUsulanController extends Controller
{
    public function index()
    {
        return view('pages.Penyusul.status-usulan');
    }
}
