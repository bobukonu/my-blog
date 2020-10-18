<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;


class DashboardController extends AdminController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home.index');
    }


    public function edit(Request $request)
    {
      $user = $request->user();
      return view('backend.home.edit', compact('user'));
    }


    public function update(Requests\AccountUpdateRequest $request)
    {

    $user = $request->user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt('password');
    $user->slug = $request->input('slug');
    $user->bio = $request->input('bio');

    $user->save();

      return redirect()->back()->with('message', "Account was updated successfully");
    }

}
