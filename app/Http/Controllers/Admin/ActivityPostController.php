<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Activity;
use App\Model\Admin\ActivityPanel;
use App\Model\Admin\ActivityPost;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\PostDec;

class ActivityPostController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.our-activity.post.index')
            ->with([
                'posts'=>ActivityPost::orderByDesc('id')->get(),
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {

        return view('admin.our-activity.post.create')
            ->with([
                'panelNames'=>ActivityPanel::where('status',1)->get(),
                'activities'=>Activity::where('status',1)->get()
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'short_title'=>['required','max:32'],
            'logo'=>['required','mimes:jpeg,png,jpg','max:512'],
            'description'=>['required']
        ]);

        //Image and Thumb upload and resize
        $image = $request->file('logo');
        $imageNameThumb = 'Activity_post_'.time().'_'.$request->logo->getClientOriginalName();
        $destination = public_path('uploads/our_activity/post');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(90,90)
            ->save($destination.'/'.$imageNameThumb);

        $post = new ActivityPost();
        $post->title = $request->title;
        $post->short_title = $request->short_title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->logo = 'uploads/our_activity/post/'.$imageNameThumb;
        $post->status = $request->status;
        $post->created_by = \Auth::id();
        $post->save();
        if ($request->activity){
            $post->activities()->sync($request->activity);
        }
        if ($request->activity_panel){
            $post->activityPanels()->sync($request->activity_panel);
        }
        toast('Activity post created successfully','success');
        return redirect()->route('admin.activity.post.index');
    }

    public function edit($id)
    {
        return view('admin.our-activity.post.edit')
            ->with([
                'post'=>ActivityPost::where('id',$id)->first(),
                'activities'=>Activity::all(),
                'panelNames'=>ActivityPanel::all()
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'short_title'=>['required','max:32'],
            'logo'=>['nullable','mimes:jpeg,png,jpg','max:512'],
            'description'=>['required']
        ]);
        $post = ActivityPost::where('id',$id)->first();
        if ($request->hasFile('logo')){
            //Image and Thumb upload and resize
            $image = $request->file('logo');
            $imageNameThumb = 'Activity_post_'.time().'_'.$request->logo->getClientOriginalName();
            $destination = public_path('uploads/our_activity/post');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(90,90)
                ->save($destination.'/'.$imageNameThumb);
            @unlink($post->logo);

            $post->title = $request->title;
            $post->short_title = $request->short_title;
            $post->slug = Str::slug($request->title);
            $post->description = $request->description;
            $post->logo = 'uploads/our_activity/post/'.$imageNameThumb;
            $post->status = $request->status;
            $post->updated_by = \Auth::id();
            $post->save();
            $post->activities()->sync($request->activity);
            $post->activityPanels()->sync($request->activity_panel);

        }else{
            $post->title = $request->title;
            $post->short_title = $request->short_title;
            $post->slug = Str::slug($request->title);
            $post->description = $request->description;
            $post->status = $request->status;
            $post->updated_by = \Auth::id();
            $post->save();
            $post->activities()->sync($request->activity);
            $post->activityPanels()->sync($request->activity_panel);
        }
        alert()->success('Success','Activity Post updated Successfully');
        return redirect()->route('admin.activity.post.index');
    }

    public function delete($id)
    {
       $post = ActivityPost::where('id',$id)->first();
        @unlink($post->logo);
        $post->activities()->sync([]);
        $post->activityPanels()->sync([]);
        $post->delete();
        alert()->success('Success','Activity Post Deleted Successfully');
        return redirect()->route('admin.activity.post.index');
    }
}
