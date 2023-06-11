<?php

namespace App\Http\Controllers\Penyusul;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Profile extends Controller
{
    public function index(Request $request)
    {
        // $profile = User::all();
        $profile = $request->user();

        return view('pages.penyusul.profile.edit-profile', compact('profile'));
    }
}
