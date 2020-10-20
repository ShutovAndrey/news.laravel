<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->paginate(7);  //whereId
        return view('admin.users', ['users' => $users]);
    }

    public function toggleAdmin(User $user)
    {
        $user->is_admin =!$user->is_admin;
        $user->save();
        return redirect(route('admin.users.index'));
    }


    public function destroy(User $user)   //нужно отлаживать
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Пользователь удален');

    }


    public function edit() //нужно отлаживать
    {

    }
}
