<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function register(){

    


    

    return view('register');
    }
    public function store(UserRequest $request){

        $data = $request->validated();
        $data['email_verified_at'] = now();

        $newUser = User::create($data);


        $newUser->save();
        //dd($request->all());

        return redirect()->route('home')->with('success', 'Akcja pomyślnie wykonana');
    }
   



}
