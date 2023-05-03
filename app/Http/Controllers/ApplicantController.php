<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Applied_job;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    public function apply_job(Job $job)
    {
        return view('apply_job', compact('job'));
    }

    public function store_apply(Request $request, Job $job)
    {
        // $job_id = $job->id;
        $job_id = $job->id ;
        $user_id = $job->user->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'cv' => 'required'
        ]);

        $file = $request->file('cv');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $applicant = Applicant::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'cv' => $path
        ]);

        if ($applicant == true) {
            Applied_job::create([   
                'applicant_id' => $applicant->id,
                'job_id' => $job_id,
                'user_id' => $user_id
            ]);
        }

        return Redirect::back();
    }

    public function show()
    {
        $applicants = Applicant::all();
        return view('applicant', compact('applicants'));
    }

        public function delete(Applied_job $applied_job)
        {
            $applicant = $applied_job->applicant ;

            $applied_job->delete();
            $applicant->delete();
            return Redirect::back();
        }


}