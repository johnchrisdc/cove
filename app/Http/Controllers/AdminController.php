<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use Redirect;

use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function users() {
      $users = User::where('id', '!=', Auth::user()->id)->get();

      return view('admin.users', ['users' => $users]);
    }

    public function groups() {
      $groups = Group::all();
      $users = User::all();

      foreach ($groups as $group) {
          $group->getLeader();
      }

      return view('admin.groups', ['groups' => $groups, 'users' => $users]);
    }

    public function new_group(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:groups|max:255',
            'leader_id' => 'required',
            'description' => 'max:255'
        ]);

        $user = User::where('id', 79)->first();
        if ($user == null) {
            return Redirect::back()->withErrors("Invalid user");
        }

        $group = new Group;
        $group->name = $request->name;
        $group->leader_id = $request->leader_id;
        $group->description = $request->description;

        $group->save();



        return redirect('admin/groups');
    }
}
