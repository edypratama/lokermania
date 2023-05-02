<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    //
    public function create()
    {
        return view('create_job');
    }

    public function store(Request $request)
    {

        $user_id = Auth::id();

        $requirements = implode(',', $request->requirements);

        $request->validate([
            'title' => 'required',
            'requirements' => 'required',
            'description' => 'required',
            'major' => 'required',
            'graduates' => 'required',
            'experiences' => 'required',
            'salary' => 'required',
            'job_function' => 'required',

        ]);

        Job::create([
            'title' => $request->title,
            'user_id' => $user_id,
            'requirements' => $requirements,
            'description' => $request->description,
            'major' => $request->major,
            'graduates' => $request->graduates,
            'experiences' => $request->experiences,
            'salary' => $request->salary,
            'job_function' => $request->job_function,
        ]);

        return Redirect::back();
    }

    public function show_jobs()
    {
        $jobs = Job::orderByDesc('id')->paginate(4);
        return view('Jobs', compact('jobs'));
    }

    public function search(Request $request)
    {
        // takes data from input qprov
        $qprov = $request->qprov;
        $users = User::where('provinsi', $qprov)->get();

        // takes data from input q
        $qjob = $request->q;

        // takes the id from var users an inserts it into array
        $userIds = $users->pluck('id')->toArray();

        // querry
        $data = Job::whereIn('user_id', $userIds)
            ->where('title', 'LIKE', "%$qjob%")
            ->get();

        return view('debbuging', compact('data', 'qjob'));
    }

    public function jobs_search()
    {

        $jobs_up = Job::orderByDesc('id')->paginate(4);
        $jobs = Job::all();

        return view('job-search', compact('jobs', 'jobs_up'));
    }

    public function job_detail(Job $job)
    {
        // mengambil user id
        $user_id = $job->user_id;
        // Data job dari suatu perusahaan 
        $jobs = Job::where('user_id', $user_id)->get();
        // tanggal
        $date1 = $job->created_at;
        $date_array = explode(' ', $date1);
        $date = $date_array[0];
        // mengambil requirements
        $data = $job->requirements;
        $requirements = explode(',', $data);

        return view('job-detail', compact('job', 'jobs', 'date', 'requirements'));
    }

    public function update_job(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'requirements' => 'required',
            'description' => 'required',
            'major' => 'required',
            'graduates' => 'required',
            'experiences' => 'required',
            'salary' => 'required'
        ]);

        $job->update([
            'title' => $request->title,
            'requirements' => $request->requirements,
            'description' => $request->description,
            'major' => $request->major,
            'graduates' => $request->graduates,
            'experiences' => $request->experiences,
            'salary' => $request->salary
        ]);

        return Redirect::route('show_profile');

    }

    public function delete_job(Job $job)
    {
        $job->delete();
        return Redirect::back();
    }

    public function about_us()
    {
        return view('about_us');
    }




}