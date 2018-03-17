<?php

namespace App\Http\Controllers;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Request as Req;
use App\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' , 'Admin']);
    }

    public function index()
    {
        return view('admin.index');
    }


    public function approve_jobs()
    {
        $jobs = Job::where('approved' , 0)->get();
        return view('admin.jobstoapprove' , compact('jobs'));
    }


    public function approve_job($id)
    {
        $job = Job::find($id);
        $job->approved = 1;
        $job->save();
        return response()->json([] , 200);
    }

    public function disapproved_jobs()
    {
        $jobs = Job::where('approved' , 0)->get();
        return view('admin.disapprovedjobs' ,compact('jobs'));
    }


    public function delete_job($id)
    {
        $job = Job::find($id);
        if($job->approved != 0)
        {
            return response()->json([] , 404);
        }
        $job->delete();
        return response()->json([] , 200);
    }


    public function customers()
    {
        $customers = User::with('roles')->where('name' , 'customer')->paginate(20);
        return view('admin.customers' , compact('customers'));
    }

    public function workers()
    {
        $customers = User::with('roles')->where('name' , 'worker')->paginate(20);
        return view('admin.workers' , compact('workers'));
    }

    public function companies()
    {
        $customers = User::with('roles')->where('name' , 'company')->paginate(20);
        return view('admin.companies' , compact('companies'));
    }

    public function requests()
    {
        $requests = Req::paginate(20);
        return view('admin.requests' , comapct('requests'));
    }


    public function accepted_requests()
    {
        $requests = Req::where('status' , '1')->paginate(20);
        return view('admin.acceptedrequests' , comapct('requests'));

    }



    public function edit_profile()
    {
        $admin = User::find(Auth::id());
        return view('admin.editprofile' , compact('admin'));
    }

    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'email' => 'email|required',
            'name' => 'required|min:3|max:100',
            'address' => 'required|min:8|max:200',
            'city' => 'required|min:5|max:100',
            'phone' => 'required|min:9|max:100|numeric'
        ]);
        if($validator->fails())
        {
            return redirect()
            ->back()
            ->withErrors($validator);
        }
        $admin = User::find(Auth::id());
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->phone = $request->input('phone');
        $admin->city = $request->input('city');
        $admin->save();
        $request->session()->flash('status' , 'your data has been updated');
        return redirect()->back();

    }


}
