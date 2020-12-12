<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\JobBazar;
use Illuminate\Http\Request;

class JobBazarController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.information.job-bazar.index')
            ->with([
                'jobs'=>JobBazar::orderByDesc('id')->get(),
                'admins'=>Admin::all()
            ]);

    }

    public function create()
    {
        return view('admin.information.job-bazar.create');
    }

    public function store(Request $request)
    {


        $this->validate($request,[
            'title'=>['required','max:191'],
            'logo'=>['required','mimes:jpeg,png,jpg','max:1024'],
            'company_name'=>['required','max:40'],
            'location'=>['required','max:40'],
            'description'=>['required']
        ]);
        $jobValue = JobBazar::latest()->first();
        $job = new JobBazar();
        if ($jobValue === null){
            $job->jobId =  100001;
        }else{
            $job->jobId = 100001+(int) $jobValue->id;
        }
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move('uploads/information/job/',$filename);
            $job->logo = 'uploads/information/job/'.$filename;
        }
        $job->title = $request->title;
        $job->company_name = $request->company_name;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->status = $request->status;
        $job->created_by = \Auth::id();
        $job->save();
        toast('Job Added Successfully..!!','success');
        return redirect()->route('admin.information.jobbazar.index');

    }

    public function edit($id)
    {
        return view('admin.information.job-bazar.edit')
            ->with([
                'job'=>JobBazar::where('id',$id)->first()
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:191'],
            'logo'=>['nullable','mimes:jpeg,png,jpg','max:1024'],
            'company_name'=>['required','max:40'],
            'location'=>['required','max:40'],
            'description'=>['required']
        ]);
        $job = JobBazar::where('id',$id)->first();
        if ($request->hasFile('logo')){
            @unlink($job->logo);
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move('uploads/information/job/',$filename);
            $job->logo = 'uploads/information/job/'.$filename;
            $job->title = $request->title;
            $job->company_name = $request->company_name;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->status = $request->status;
            $job->updated_by = \Auth::id();
            $job->save();
            alert()->success('Success','Job Updated Successfully..!!');
            return redirect()->route('admin.information.jobbazar.index');
        }else{
            $job->title = $request->title;
            $job->company_name = $request->company_name;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->status = $request->status;
            $job->updated_by = \Auth::id();
            $job->save();
            alert()->success('Success','Job Updated Successfully..!!');
            return redirect()->route('admin.information.jobbazar.index');
        }
    }

    public function delete($id)
    {
       $job = JobBazar::where('id',$id)->first();
       @unlink($job->logo);
       $job->delete();
        alert()->success('Success','Job deleted Successfully..!!');
       return redirect()->route('admin.information.jobbazar.index');
    }
}
