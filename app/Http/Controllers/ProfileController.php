<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $errors = [];
        if ($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());

            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);
                $user->save();
                return redirect()->route('profileUpdate')->with('success', 'Профиль изменен');

            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
                return redirect()->route('profileUpdate')->withErrors($errors);
            }
        }

        return view('profile', [
            'user' => $user]);
    }

    protected function validateRules()
    {
        return [
            'name' => 'string|max:30',
            'email' => 'email',
            'password' => 'nullable|string|min:3',
            'newPassword' => 'nullable|string|min:3'

        ];
    }

    protected function attributeNames()
    {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }

}
