<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            $tasks = \App\Models\Task::all();
            if ($usertype == 'user') {
                return view('tasks.index', compact('tasks'));
            } elseif ($usertype == 'admin') {
                return view('admin.index', compact('tasks'));
            } else {
                return redirect()->back();
            }
        }
    }
}
