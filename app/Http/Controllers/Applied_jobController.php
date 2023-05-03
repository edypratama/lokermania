<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Applied_job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Applied_jobController extends Controller
{
    //
    public function show_applied() {
        $user_id = Auth::id();
        $applied_jobs = Applied_job::where('user_id', $user_id)->get();
        return view('dashboard', compact('applied_jobs'));
    }

    public function SendEmail($item) 
    {
        $datas = Applicant::where('id', $item)->get();
        foreach ($datas as $data) {
            return redirect('mailto:'. $data->email);
        }
    }
}
