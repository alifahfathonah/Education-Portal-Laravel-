<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Skill;
use App\Model\Admin\Tips;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TipsController extends Controller implements ComponentCRUD
{
    //Access Security via Middleware and Guard
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $tips = Tips::orderBy('id','DESC')->get();
        $admin = Admin::all();
        return view('admin.tips.index')
            ->with([
                'tips'=>$tips,
                'admins'=>$admin
            ]);
    }

    public function create()
    {
        return view('admin.tips.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'category'=>['required'],
            'image'=>['required','mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required'],
        ]);

        //Image and Thumb upload and resize
        $image = $request->file('image');
        $imageNameThumb = 'Tips_thumb_'.time().'_'.$request->image->getClientOriginalName();
        $imageName = 'Tips_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/tips/thumb');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(150,135)->save($destination.'/'.$imageNameThumb);
        $realImageDestination = public_path('uploads/tips/main');
        $image->move($realImageDestination,$imageName);

        $tips = new Tips();
        $tips->title = $request->title;
        $tips->slug = Str::slug($request->title);
        $tips->image = $imageName;
        $tips->thumb = $imageNameThumb;
        $tips->description = $request->description;
        $tips->category = $request->category;
        $tips->status = $request->status;
        $tips->created_by = \Auth::user()->id;
        $tips->save();
        toast('Tips and Tricks Added Successfully','success');
        return redirect()->route('admin.tips.index');
    }

    public function delete($id)
    {
        $tips = Tips::where('id',$id)->first();
        $tips->deleted_by = \Auth::user()->id;
        $tips->save();
        $tips->delete();
        alert()->success('Success','Tips and Tricks delete Successful...!!!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $tips = Tips::where('id',$id)->first();
        return view('admin.tips.edit')->with([
            'tips'=>$tips
        ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'category'=>['required'],
            'image'=>['mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required'],
        ]);
        if ($request->hasFile('image')) {
            //Image and Thumb upload and resize
            $tips = Tips::where('id', $id)->first();
            $image = $request->file('image');
            $imageNameThumb = 'Tips_thumb_' . time() . '_' . $request->image->getClientOriginalName();
            $imageName = 'Tips_' . time() . '_' . $request->image->getClientOriginalName();
            $destination = public_path('uploads/tips/thumb');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(150, 135)->save($destination . '/' . $imageNameThumb);
            $realImageDestination = public_path('uploads/tips/main');
            $image->move($realImageDestination, $imageName);
            @unlink('uploads/tips/main/' . $tips->image);
            @unlink('uploads/tips/thumb/' . $tips->thumb);
            $tips->title = $request->title;
            $tips->slug = Str::slug($request->title);
            $tips->image = $imageName;
            $tips->thumb = $imageNameThumb;
            $tips->description = $request->description;
            $tips->category = $request->category;
            $tips->status = $request->status;
            $tips->updated_by = \Auth::user()->id;
            $tips->save();
            alert()->success('Success', 'Tips and Tricks update Successful...!!!');
            return redirect()->route('admin.tips.index');
        }else{
            $tips = Tips::where('id',$id)->first();
            $tips->title = $request->title;
            $tips->slug = Str::slug($request->title);
            $tips->description = $request->description;
            $tips->category = $request->category;
            $tips->status = $request->status;
            $tips->updated_by = \Auth::user()->id;
            $tips->save();
            alert()->success('Success','Tips and tricks update Successful...!!!');
            return redirect()->route('admin.tips.index');
        }
    }
    public function trashIndex()
    {
        $tips = Tips::onlyTrashed()->get();
        $admin = Admin::all();
        return view('admin.tips.trash')
            ->with([
                'tips'=>$tips,
                'admins'=>$admin
            ]);
    }
    public function restore($id)
    {
        $tips = Tips::withTrashed()->where('id',$id)->restore();
        toast('Tips and Tricks restore successful...!!!','success');
        return redirect()->back();
    }
    public function trashDelete($id)
    {
        $tips = Tips::withTrashed()->where('id',$id)->first();
        @unlink('uploads/tips/main/'.$tips->image);
        @unlink('uploads/tips/thumb/'.$tips->thumb);
        $tips->forceDelete();
        toast('Tips and Tricks Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
}
