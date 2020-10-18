<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests;

class UsersController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $users      = User::orderBy('name')->paginate($this->limit);
       $usersCount = User::count();
         return view('backend.users.index', compact('users', 'usersCount'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
       $user = new User();
       return view('backend.users.create', compact('user'));

     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Requests\UserStoreRequest $request)
     {

     $user = new User;
     $user->name = $request->input('name');
     $user->email = $request->input('email');
     $user->password = bcrypt('password');
     $user->slug = $request->input('slug');
     $user->bio = $request->input('bio');

     $user->save();
     $user->attachRole($request->role);


       return redirect("/admin/users")->with('message', "New User was created successfully");
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
       $user = User::find($id);
       return view("backend.users.edit", compact('user'));

     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Requests\UserUpdateRequest $request, $id)
     {

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->slug = $request->input('slug');
        $user->bio = $request->input('bio');
        $user->save();
        $user->detachRoles();
        $user->attachRole($request->role);


       return redirect("/admin/users")->with('message', "User was updated successfully");
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Requests\UserDestroyRequest $request, $id)
     {
       $user = User::find($id);
      $deletedOption = $request->delete_option;
      $selectedUser = $request->selected_user;

      if ($deletedOption == 'delete')
      {
        // delete user post
        $user->posts()->withTrashed()->forceDelete();
      }
      elseif ($deletedOption == 'attribute')
      {
        $user->posts()->update(['author_id' => $selectedUser]);
      }

       $user->delete();

       return redirect("/admin/users")->with('message', "User was deleted successfully");
     }

     public function confirm(Requests\UserDestroyRequest $request, $id)
     {
       $user = User::find($id);
       $users = User::where('id', '!=', $user->id)->pluck('name', 'id');

       return view("backend.users.confirm", compact('user', 'users'));
      }

}
