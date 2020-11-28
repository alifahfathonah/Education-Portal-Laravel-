<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Slider;
use App\Model\Admin\SliderPriority;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        return view('admin.single.slider.index')
            ->with([
                'sliders'=>Slider::with('sliderPriorities')->orderBy('priority','ASC')->get(),
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {

        return view('admin.single.slider.create')
            ->with([
                'priorities'=>SliderPriority::all(),
                'sliders' =>Slider::pluck('priority')
            ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:255'],
            'image'=>['required','mimes:jpeg,png,jpg','max:5120'],
            'priority'=>['required'],
        ]);
        //Image and Thumb upload and resize
        $image = $request->file('image');
        $imageNameThumb = 'Sliderr_main_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/slider/main');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(1349,720)
            ->save($destination.'/'.$imageNameThumb);
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->image = $imageNameThumb;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->created_by = \Auth::user()->id;
        $slider->save();
        toast('Slider Added Successfully','success');
        return redirect()->route('admin.slider.index');
    }

    public function edit($id)
    {
        return view('admin.single.slider.edit')
            ->with([
                'slider'=>Slider::with('sliderPriorities')->where('id',$id)->first(),
                'admins'=>Admin::all(),
                'allSlider'=>Slider::pluck('priority'),
                'priorities'=>SliderPriority::all()
            ]);

    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:255'],
            'image'=>['nullable','mimes:jpeg,png,jpg','max:5120'],
            'priority'=>['required'],
        ]);
        $slider = Slider::where('id',$id)->first();
        if ($request->hasFile('image')){
            //Image and Thumb upload and resize
            $image = $request->file('image');
            $imageNameThumb = 'Sliderr_main_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/slider/main');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(1349,720)
                ->save($destination.'/'.$imageNameThumb);
            @unlink('uploads/slider/main/'.$slider->image);
            $slider->title = $request->title;
            $slider->image = $imageNameThumb;
            $slider->priority = $request->priority;
            $slider->status = $request->status;
            $slider->updated_by = \Auth::user()->id;
            $slider->save();
            toast('Slider Updated Successfully','success');
            return redirect()->route('admin.slider.index');
        }else{
            $slider->title = $request->title;
            $slider->priority = $request->priority;
            $slider->status = $request->status;
            $slider->updated_by = \Auth::user()->id;
            $slider->save();
            toast('Slider Updated Successfully','success');
            return redirect()->route('admin.slider.index');
        }
    }

    public function delete($id)
    {
        $slider = Slider::where('id',$id)->first();
        @unlink('uploads/slider/main/'.$slider->image);
        $slider->delete();
        alert()->success('success','Slider Deleted Successfully...!');
        return redirect()->back();
    }

}
