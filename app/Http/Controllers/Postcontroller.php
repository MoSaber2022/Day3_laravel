<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
//use App\Models\User;

class Postcontroller extends Controller
{
    //
    public function index()
    {
        $users = post::simplePaginate(20);


        return view('posts.index')->with(["users" => $users]);
    }
    public function create()
    {

        return view('posts.create');
    }

    public function store(Request $request)
    {   $name = $request->input('name');
        $email = $request->input('body');
        $password = $request->input('r1');

        $ud = $req->input('Uid');

        post::create(
        ['title' => $name 
        , 'body' => $email]
    );

        return redirect()->route("posts.index");
    }
    public function show($id)
    {

        return dd(post::find($id));
    }



       public function edit($id)
       {
        $user = Post::where('id', $id)->first();
          

            return view('posts.edit')->with( [ "user" => $user  ]);


    }

       public function update(Request $request , $id)
       {

        $name = $request->input('name');
        $email = $request->input('body');
        $password = $request->input('r1');


            post::find($id)->update(['title'=> $name , 'body'=> $email , 'enabled' => $pass ]);

            return redirect()->Route("posts.index");
    }
       public function destroy($id)
       {
        post::where('id', $id)->delete();

        return redirect()->Route("posts.index");



    }

   

    public function restore(Request $request){


        post::onlyTrashed()-restore();


        return redirect()->route('posts.dlist');

    }


}
