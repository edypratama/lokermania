<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        $user_id = Auth::id();
    
        $jobs = Job::where('user_id', $user_id)->get();
        $requirements = [];
          
        return view('profile', compact('user', 'jobs'));
        // foreach ($jobs as $job) {
        //     $data = $job->requirements;
        //     $jobRequirements = explode(',', $data);
        // Untuk menggabungkan 2 array
        //     $requirements = array_merge($requirements, $jobRequirements);
        // }
        // membuat array baru dan menghapus duplikat array
        // $requirements = array_unique($requirements);         
    }

    public function change_profile() 
    {  
        $user = Auth::user();
        $user_id = Auth::id();

        
        $jobs = Job::where('user_id', $user_id)->get();
        $data = $jobs->requirements;
        $requirements = explode(',', $data);
        
        return view('edit_profile', compact('user', 'jobs', 'requirements'));
    }

    public function edit_profile(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed'
        ]); 

        if ($request->file('image') == null) 
        {
            $path = Auth::user()->image;
        } else {
            $file = $request->file('image');
            $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $path , file_get_contents($file));
        }
        

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,
            'phone' => $request->phone,
            'image' => $path,
            'password' => Hash::make($request->password)
        ]);

        return Redirect::route('show_profile');
        
    }

    public function delete_profile() 
    {
        $image = 'user-icon.png';
        $user = Auth::user();
        $user->update([
            'image' => $image 
        ]);

        return Redirect::back();
    }
}
