<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class Usercontroller extends Controller
{
    //
    public function index()
    {
        $users = User::simplePaginate(15);


        return view('users.index')->with(["users" => $users]);
    }
    public function create()
    {

        return view('users.create');
    }
    public function store(Request $request)
    {   $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('pass');
        User::create(
        ['name' => $name , 'email' => $email , 'password' => $password]);

        return redirect()->Route("users.index");
    }
    public function show($id)
    {

        return dd(User::find($id));
    }



       //
       public function edit($id)
       {
        $user = User::where('id', $id)->first();


            return view('users.edit')->with( [ "user" => $user  ]);


    }

       public function update(Request $request , $id)
       {

        $name = $request->input('name');
        $email = $request->input('email');

            User::find($id)->update(['name'=> $name , 'email'=> $email ]);

            return redirect()->route("users.index");
    }
       public function destroy($id)
       {
        User::where('id', $id)->delete();

        return redirect()->route("users.index");



    }

}
