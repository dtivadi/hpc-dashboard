<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')
            ->join('users', 'jobs.queue', '=', 'users.email') // Assuming 'queue' might store email or similar for now
            ->select('jobs.*', 'users.name as user_name')
            ->get();

        // If join fails because of schema, fallback to simple fetch
        if ($jobs->isEmpty()) {
            $jobs = DB::table('jobs')->get();
        }

        return view('jobs', compact('jobs'));
    }
}
