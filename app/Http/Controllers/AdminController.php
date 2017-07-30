<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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
      $users = User::all();

      return view('admin.users', ['users' => $users]);
    }
}
