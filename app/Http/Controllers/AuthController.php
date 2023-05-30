<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Traits\ApiResponse;
use App\Traits\ApiResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        // if (!Auth::attempt($validated)) {
        //     return $this->apiError('Credential not match', Response::HTTP_UNAUTHORIZED);
        // }

        if (auth()->attempt(array('email' => $request['email'], 'password' => $request['password']))) {
            if (Auth::user()->role_id == 1) {
                // dd("suskes");
                dd(Auth::user()->role_id);
                return redirect()->route("super-admin");
            } else if (Auth::user()->role_id == 2) {
                $user = User::where('email', $validated['email'])->first();
                $user->createToken('auth_token')->plainTextToken;
                return redirect()->route("admin");
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
}
