<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
public  function getregisterform()
{

    return view('Auth.registerform');

}

public  function register(Request $request)
{

    $data =$request->validate([

        'name'=>'required|string|max:191',
        'email'=>'required|email|max:191',

        'password'=>'required|string|confirmed|min:5|max:25',
    ]);

     $data['password'] = Hash::make($data['password']);

    $user= User::create($data);
    /* 'name'=>$request->name,
             'email'=>$request->email,
             'password'=>Hash::make($request->password),*/

   Auth::login($user);

return redirect()->route('loginform');
}



public  function loginform()
{

return view('Auth.loginform');

}



    public  function login(Request $request)
    {
        $request->validate([


            'email'=>'required|email|max:191',

            'password'=>'required|string|min:5|max:25',
        ]);

        $islogin =  Auth::attempt(['email'=>$request->email,

             'password'=>$request->password
        ]);

        //dd($islogin);
      if($islogin) {
            return redirect(route('question'));
        }

        else
        {
            return  back();
        }
    }


    public  function logout()

    {

          Auth::logout();
          return redirect(url('question'));


    }

}
