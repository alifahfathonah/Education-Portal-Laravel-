<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $story = SuccessStory::orderByDesc('id')->get();
        return view('admin.single.story.index')
            ->with([
                'stories'=>$story,
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.single.story.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255'],
            'designation'=>['required','max:40'],
            'story'=>['required'],
            'rating'=>['required'],
            'image'=>['required','mimes:jpeg,bmp,png,jpg','max:500'],
        ]);
        //Image and Thumb upload and resize
        $image = $request->file('image');
        $imageNameThumb = 'Story_main_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/story/main');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(54,54)
            ->save($destination.'/'.$imageNameThumb);
        $story = new SuccessStory();
        $story->name = $request->name;
        $story->designation = $request->designation;
        $story->story = $request->story;
        $story->rating = $request->rating;
        $story->image = $imageNameThumb;
        $story->status = $request->status;
        $story->created_by = \Auth::user()->id;
        $story->save();
        toast('Success Story created Successfully...!','success');
        return redirect()->route('admin.story.index');
    }

    public function edit($id)
    {
        $story = SuccessStory::where('id',$id)->first();
        return view('admin.single.story.edit')
            ->with([
               'story'=>$story
            ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255'],
            'designation'=>['required','max:40'],
            'story'=>['required'],
            'rating'=>['required'],
            'image'=>['nullable','mimes:jpeg,bmp,png,jpg','max:500'],
        ]);
        $story = SuccessStory::where('id',$id)->first();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageNameThumb = 'Partner_main_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/story/main');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(54,54)
                ->save($destination.'/'.$imageNameThumb);
            @unlink('uploads/story/main/'.$story->image);
            $story->name = $request->name;
            $story->designation = $request->designation;
            $story->story = $request->story;
            $story->rating = $request->rating;
            $story->image = $imageNameThumb;
            $story->status = $request->status;
            $story->updated_by = \Auth::user()->id;
            $story->save();
            alert()->success('Success','Success Story Update Successful..!!');
            return redirect()->route('admin.story.index');
        }else{
            $story->name = $request->name;
            $story->designation = $request->designation;
            $story->story = $request->story;
            $story->rating = $request->rating;
            $story->status = $request->status;
            $story->updated_by = \Auth::user()->id;
            $story->save();
            alert()->success('Success','Success Story Update Successful..!!');
            return redirect()->route('admin.story.index');
        }
    }

    public function delete($id)
    {
        $story = SuccessStory::where('id',$id)->first();
        @unlink('uploads/story/main/'.$story->image);
        $story->delete();
        toast('Success Story Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
}
