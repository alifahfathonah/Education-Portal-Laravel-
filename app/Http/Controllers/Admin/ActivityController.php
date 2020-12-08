<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Activity;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.our-activity.activity.index')
            ->with([
                'activities'=>Activity::orderByDesc('id')->get(),
                'admins'=>Admin::all()
            ]);
    }
    public function create()
    {
        return view('admin.our-activity.activity.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:30','unique:activities'],
            'image'=>['required','mimes:jpeg,png,jpg','max:512'],
        ]);
        $image = $request->file('image');
        $imageNameThumb = 'Activity_main_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/our_activity/activity/main');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(270,270)
            ->save($destination.'/'.$imageNameThumb);

        $activity = new Activity();
        $activity->title = $request->title;
        $activity->slug = Str::slug($request->title);
        $activity->image = 'uploads/our_activity/activity/main/'.$imageNameThumb;
        $activity->status = $request->status;
        $activity->created_by = \Auth::id();
        $activity->save();
        toast('Activity Added Successful...!','success');
        return redirect()->route('admin.activity.index');

    }

    public function edit($id)
    {
        return view('admin.our-activity.activity.edit')
            ->with([
                'activity'=>Activity::where('id',$id)->first()
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:30|unique:activities,title,'.$id,
            'image'=>['nullable','mimes:jpeg,png,jpg','max:512']
        ]);
        $activity = Activity::where('id',$id)->first();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageNameThumb = 'Activity_main_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/our_activity/activity/main');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(270,270)
                ->save($destination.'/'.$imageNameThumb);
            @unlink($activity->image);
            $activity->title = $request->title;
            $activity->slug = Str::slug($request->title);
            $activity->image = 'uploads/our_activity/activity/main/'.$imageNameThumb;
            $activity->status = $request->status;
            $activity->updated_by = \Auth::id();
            $activity->save();
            alert()->success('Success','Activity Added Successful...!');
            return redirect()->route('admin.activity.index');
        }else{
            $activity->title = $request->title;
            $activity->slug = Str::slug($request->title);
            $activity->status = $request->status;
            $activity->updated_by = \Auth::id();
            $activity->save();
            alert()->success('Success','Activity Added Successful...!');
            return redirect()->route('admin.activity.index');
        }
    }

    public function delete($id)
    {
        $activity = Activity::where('id',$id)->first();
        @unlink($activity->image);
        $activity->delete();
        alert()->success('success','Activity Deleted Successfully...!');
        return redirect()->back();
    }
}
