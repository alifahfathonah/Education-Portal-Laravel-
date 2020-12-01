<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\PhotoGallery;
use App\Model\Admin\PhotoGalleryYear;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $photos = PhotoGallery::with('photoGalleryYears')->orderBYDesc('id')->get();
        return view('admin.single.photo_gallery.index')
            ->with([
                'photos'=>$photos,
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.single.photo_gallery.create')
            ->with([
                'years' => PhotoGalleryYear::orderByDesc('name')->get()
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'title'=>['required','max:191'],
           'year'=>['required'],
           'image'=>['required','mimes:jpeg,bmp,png,jpg','max:2048'],
        ]);

        //Image and Thumb upload and resize
        $image = $request->file('image');
        $imageNameThumb = 'Gallery_thumb_'.time().'_'.$request->image->getClientOriginalName();
        $imageName = 'Gallery_main_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/gallery/thumb');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(337,202)->save($destination.'/'.$imageNameThumb);
        $realImageDestination = public_path('uploads/gallery/main');
        $image->move($realImageDestination,$imageName);

        $photo = new PhotoGallery();
        $photo->title = $request->title;
        $photo->year = $request->year;
        $photo->image = $imageName;
        $photo->thumb = $imageNameThumb;
        $photo->status = $request->status;
        $photo->created_by = \Auth::user()->id;
        $photo->save();
        toast('Photo Added Successfully ...!!','success');
        return redirect()->route('admin.photo.gallery.index');
    }
    public function edit($id)
    {
        $photo = PhotoGallery::where('id',$id)->first();
        return view('admin.single.photo_gallery.edit')
            ->with([
                'photo'=>$photo,
                'years' => PhotoGalleryYear::orderByDesc('name')->get()
            ]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:191'],
            'year'=>['required'],
            'image'=>['nullable','mimes:jpeg,bmp,png,jpg','max:2048'],
        ]);
        $photo = PhotoGallery::where('id',$id)->first();
        if ($request->hasFile('image')){
            //Image and Thumb upload and resize
            $image = $request->file('image');
            $imageNameThumb = 'Gallery_thumb_'.time().'_'.$request->image->getClientOriginalName();
            $imageName = 'Gallery_main_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/gallery/thumb');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(337,202)->save($destination.'/'.$imageNameThumb);
            $realImageDestination = public_path('uploads/gallery/main');
            $image->move($realImageDestination,$imageName);
            @unlink('uploads/gallery/main/'.$photo->image);
            @unlink('uploads/gallery/thumb/'.$photo->thumb);
            $photo->title = $request->title;
            $photo->year = $request->year;
            $photo->image = $imageName;
            $photo->thumb = $imageNameThumb;
            $photo->status = $request->status;
            $photo->updated_by = \Auth::user()->id;
            $photo->save();
            alert()->success('Success','Photo Updated Successfully ...!!');
            return redirect()->route('admin.photo.gallery.index');
        }else{
            $photo->title = $request->title;
            $photo->year = $request->year;
            $photo->status = $request->status;
            $photo->updated_by = \Auth::user()->id;
            $photo->save();
            alert()->success('Success','Photo Updated Successfully ...!!');
            return redirect()->route('admin.photo.gallery.index');
        }
    }

    public function delete($id)
    {
        $photo = PhotoGallery::where('id',$id)->first();
        @unlink('uploads/gallery/main/'.$photo->image);
        @unlink('uploads/gallery/thumb/'.$photo->thumb);
        $photo->delete();
        alert()->success('Success','Photo Delete Successfully ...!!');
        return redirect()->back();
    }
}
