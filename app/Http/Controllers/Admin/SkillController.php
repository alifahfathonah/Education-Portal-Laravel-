<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    //Access Security via Middleware and Guard
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //Show All Skill
    public function index()
    {
        $skills = Skill::orderBy('id','DESC')->get();
        $admin = Admin::all();
        return view('admin.skill.index')
            ->with([
                'skills'=>$skills,
                'admins'=>$admin
            ]);
    }
    //Add skill page
    public function create()
    {
        return view('admin.skill.create');
    }
    //Add New Skill
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
        $imageNameThumb = 'Skill_thumb_'.time().'_'.$request->image->getClientOriginalName();
        $imageName = 'Skill_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/skill/thumb');
        $resizeImage = \Image::make($image->getRealPath())
        ->resize(370,246)->save($destination.'/'.$imageNameThumb);
        $realImageDestination = public_path('uploads/skill/main');
        $image->move($realImageDestination,$imageName);

        //Add Skill Method
        $skill = new Skill();
        $skill->title = $request->title;
        $skill->slug = Str::slug($request->title);
        $skill->image = $imageName;
        $skill->thumb = $imageNameThumb;
        $skill->description = $request->description;
        $skill->category = $request->category;
        $skill->status = $request->status;
        $skill->created_by = \Auth::user()->id;
        $skill->save();
        toast('Skill Added Successfully','success');
        return redirect()->route('admin.skill.index');
    }
    //Attempt Soft delete by user
    public function delete($id)
    {
        $skill = Skill::where('id',$id)->first();
        $skill->deleted_by = \Auth::user()->id;
        $skill->save();
        $skill->delete();
        alert()->success('Success','Skill delete Successful...!!!');
        return redirect()->back();
    }
    //Update Edit Skill Data
    public function edit($id)
    {
        $skill = Skill::where('id',$id)->first();
        return view('admin.skill.edit')->with([
            'skill'=>$skill
        ]);
    }
    //Update Skill Data
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'category'=>['required'],
            'image'=>['mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required'],
        ]);
        if ($request->hasFile('image')){
            //Image and Thumb upload and resize
            $skill = Skill::where('id',$id)->first();
            $image = $request->file('image');
            $imageNameThumb = 'Skill_thumb_'.time().'_'.$request->image->getClientOriginalName();
            $imageName = 'Skill_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/skill/thumb');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(370,246)->save($destination.'/'.$imageNameThumb);
            $realImageDestination = public_path('uploads/skill/main');
            $image->move($realImageDestination,$imageName);
            @unlink('uploads/skill/main/'.$skill->image);
            @unlink('uploads/skill/thumb/'.$skill->thumb);
            $skill->title = $request->title;
            $skill->slug = Str::slug($request->title);
            $skill->image = $imageName;
            $skill->thumb = $imageNameThumb;
            $skill->description = $request->description;
            $skill->category = $request->category;
            $skill->status = $request->status;
            $skill->updated_by = \Auth::user()->id;
            $skill->save();
            alert()->success('Success','Skill update Successful...!!!');
            return redirect()->route('admin.skill.index');

        }else{
            $skill = Skill::where('id',$id)->first();
            $skill->title = $request->title;
            $skill->slug = Str::slug($request->title);
            $skill->description = $request->description;
            $skill->category = $request->category;
            $skill->status = $request->status;
            $skill->updated_by = \Auth::user()->id;
            $skill->save();
            alert()->success('Success','Skill update Successful...!!!');
            return redirect()->route('admin.skill.index');
        }
    }
    //Show Soft deleted data
    public function trashIndex()
    {
        $skills = Skill::onlyTrashed()->get();
        $admin = Admin::all();
        return view('admin.skill.trash')
            ->with([
                'skills'=>$skills,
                'admins'=>$admin
            ]);
    }
    //Restore Soft deleted data
    public function restore($id)
    {
        $skill = Skill::withTrashed()->where('id',$id)->restore();
        toast('Skill restore successful...!!!','success');
        return redirect()->back();
    }
    public function trashDelete($id)
    {
        $skill = Skill::withTrashed()->where('id',$id)->first();
        @unlink('uploads/skill/main/'.$skill->image);
        @unlink('uploads/skill/thumb/'.$skill->thumb);
        $skill->forceDelete();
        toast('Skill Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
}
