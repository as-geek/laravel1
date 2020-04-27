<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $listUsers = Users::getListUsers();
        return view('admin.profile.index', ['listUsers' => $listUsers]);
    }

    public function update($id)
    {
        return view('admin.profile.update', ['user' => Users::getUser($id)->first()]);
    }

    public function saveUpdate($id, Request $request)
    {
        /** @var Users $user */
        $user = Users::find($id);
        $user->fill($request->all());
        $user->save();

        return redirect()->route('admin::profile::index');
    }
}
