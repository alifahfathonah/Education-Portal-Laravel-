<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //
    public function index()
    {
        $event = Event::orderByDesc('id')->get();
        return view('admin.event.index')
            ->with([
                'events'=>$event,
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'event_type'=>['required'],
            'title'=>['required','max:255'],
            'short_title'=>['required','max:30'],
            'start_date'=>['required','date'],
            'end_date'=>['required','date'],
            'image'=>['required','mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required']
        ]);
        //Image and Thumb upload and resize
        $image = $request->file('image');
        $imageNameThumb = 'Event_thumb_'.time().'_'.$request->image->getClientOriginalName();
        $imageName = 'Event_main'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/event/thumb');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(237,157)->save($destination.'/'.$imageNameThumb);
        $realImageDestination = public_path('uploads/event/main');
        $image->move($realImageDestination,$imageName);
        $event = new Event();
        $event->event_type = $request->event_type;
        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        $event->short_title = $request->short_title;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->image = $imageName;
        $event->thumb = $imageNameThumb;
        $event->description = $request->description;
        $event->status = $request->status;
        $event->created_by = \Auth::user()->id;
        $event->save();
        toast('Event/Campaign Added Successfully','success');
        return redirect()->route('admin.event.index');
    }

    public function edit($id)
    {
        $event = Event::where('id',$id)->first();
        return view('admin.event.edit')
            ->with([
                'event'=>$event
            ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'event_type'=>['required'],
            'title'=>['required','max:255'],
            'short_title'=>['required','max:30'],
            'start_date'=>['required','date'],
            'end_date'=>['required','date'],
            'image'=>['nullable','mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required']
        ]);
        $event = Event::where('id',$id)->first();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageNameThumb = 'Event_thumb_'.time().'_'.$request->image->getClientOriginalName();
            $imageName = 'Event_main_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/event/thumb');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(237,157)->save($destination.'/'.$imageNameThumb);
            $realImageDestination = public_path('uploads/event/main');
            $image->move($realImageDestination,$imageName);
            @unlink('uploads/event/main/'.$event->image);
            @unlink('uploads/event/thumb/'.$event->thumb);
            $event->event_type = $request->event_type;
            $event->title = $request->title;
            $event->slug = Str::slug($request->title);
            $event->short_title = $request->short_title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->image = $imageName;
            $event->thumb = $imageNameThumb;
            $event->description = $request->description;
            $event->status = $request->status;
            $event->updated_by = \Auth::user()->id;
            $event->save();
            alert()->success('Success','Event/Campaign update Successful...!!!');
            return redirect()->route('admin.event.index');
        }else{
            $event->event_type = $request->event_type;
            $event->title = $request->title;
            $event->slug = Str::slug($request->title);
            $event->short_title = $request->short_title;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->description = $request->description;
            $event->status = $request->status;
            $event->updated_by = \Auth::user()->id;
            $event->save();
            alert()->success('Success','Event/Campaign update Successful...!!!');
            return redirect()->route('admin.event.index');
        }
    }

    public function delete($id)
    {
        $event = Event::where('id',$id)->first();
        @unlink('uploads/event/main/'.$event->image);
        @unlink('uploads/event/thumb/'.$event->thumb);
        $event->delete();
        alert()->success('Success','Event/Campaign delete Successful...!!!');
        return redirect()->route('admin.event.index');
    }

}
