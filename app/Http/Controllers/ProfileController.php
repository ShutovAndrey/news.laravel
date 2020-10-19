<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request){
        if ($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());
        }

        $user = Auth::user();
        return view('profile',[
        'user' => $user]);
    }

    protected function validateRules(){
        return [
            'name' => 'required|string|max:15',
            'email'=> 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'

        ];
    }

    protected  function attributeNames(){
return [
    'newPassword' => 'Новый пароль'
];
}

}
