<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', ['profile' => Auth::user()]);
    }

    public function update()
    {
        return view('profile.update', ['profile' => Auth::user()]);
    }

    public function saveUpdate(Request $request)
    {
        $user = Auth::user();
        $user->fill(['password' => \Hash::make($request->post('password'))]);
        $user->save();

        return redirect()->route('profile::index');
    }
}
