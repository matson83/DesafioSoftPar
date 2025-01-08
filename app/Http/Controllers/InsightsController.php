<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class InsightsController extends Controller
{
    public function index()
    {
        if (auth()->user()->usertype != 'admin') {
            return redirect()->route('tasks.index');
        }

        $tasksCount = Task::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();

        return view('insights.index', compact('tasksCount'));
    }
}
