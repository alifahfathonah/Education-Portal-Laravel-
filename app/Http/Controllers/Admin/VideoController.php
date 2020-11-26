<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $video = Video::orderByDesc('created_at')->get();
        return view('admin.media.video.index')
            ->with([
                'videos'=>$video,
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.media.video.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255'],
            'link'=>['required'],
        ]);
        $video = new Video();
        $video->title = $request->name;
        $video->link = $request->link;
        $video->status = $request->status;
        $video->created_by = \Auth::user()->id;
        $video->save();
        toast('Video Added Successfully','success');
        return redirect()->route('admin.video.index');
    }
    public function edit($id)
    {
        $video = Video::where('id',$id)->first();
        return view('admin.media.video.edit')
            ->with([
                'video'=>$video
            ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255'],
            'link'=>['required'],
        ]);
        $video = Video::where('id',$id)->first();
        $video->title = $request->name;
        $video->link = $request->link;
        $video->status = $request->status;
        $video->updated_by = \Auth::user()->id;
        $video->save();
        toast('Video Update Successfully','success');
        return redirect()->route('admin.video.index');

    }

    public function delete($id)
    {
        $video = Video::where('id',$id)->delete();
        alert()->success('Success','Video Delete Successfully');
        return redirect()->route('admin.video.index');
    }
}
