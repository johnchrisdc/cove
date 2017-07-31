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
      $users = User::where('is_leader', true)
                      ->where('group_id', -1)
                      ->get();

      foreach ($groups as $group) {
          $group->getLeader();
          $group->getGroupMembersCount();
      }

      return view('admin.groups', ['groups' => $groups, 'users' => $users]);
    }

    public function new_group(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:groups|max:255',
            'leader_id' => 'required',
            'description' => 'max:255'
        ]);

        $user = User::where('id', $request->leader_id)->first();
        if ($user == null) {
            return Redirect::back()->withErrors("Invalid user");
        }
        if ($user->group_id != -1) {
            return Redirect::back()->withErrors("Invalid user");
        }

        $group = new Group;
        $group->name = $request->name;
        $group->leader_id = $request->leader_id;
        $group->description = $request->description;

        $group->save();

        $user->group_id = $group->id;
        $user->save();

        return redirect('admin/groups');
    }

    public function make_leader($user_id) {
        $user = User::where('id', $user_id)->first();

        if ($user == null) {
            return Redirect::back()->withErrors("Invalid user");
        }

        $user->is_leader = !$user->is_leader;

        if (!$user->is_leader) {
            $group = Group::find($user->group_id);
            if ($group != null) {
              $group->leader_id = 0;
              $group->save();
            }
        }
        
        $user->save();

        return Redirect::back();
    }
}
