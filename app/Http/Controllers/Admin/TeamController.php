<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Team;
use App\Model\Admin\TeamPanelName;
use Illuminate\Http\Request;

class TeamController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $team = Team::with('teamPanelNames')->orderByDesc('id')->get();
        return view('admin.team.index')
            ->with([
                'teams'=>$team,
                'admins'=>Admin::all()
            ]);
    }
    public function create()
    {
        return view('admin.team.create')
            ->with([
                'panelNames'=>TeamPanelName::all()
            ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'panel_name'=>['required'],
            'name'=>['required','max:255'],
            'designation'=>['required','max:255'],
            'image'=>['required','mimes:jpeg,bmp,png,jpg','max:2048'],
            'facebook'=>['nullable','url'],
            'twitter'=>['nullable','url'],
            'linkedin'=>['nullable','url'],
            'gmail'=>['nullable','url'],
        ]);
        //Image and Thumb upload and resize
        $image = $request->file('image');
        $imageNameThumb = 'Team_main_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/team/main');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(270,270)
            ->save($destination.'/'.$imageNameThumb);
        //Team Crud
        $team = new Team();
        $team->panel_name_id = $request->panel_name;
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->image = $imageNameThumb;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->gmail = $request->gmail;
        $team->status = $request->status;
        $team->created_by = \Auth::user()->id;
        $team->save();
        toast('Team Added Successfully','success');
        return redirect()->route('admin.team.index');
    }

    public function edit($id)
    {
        $team = Team::where('id',$id)->first();
        return view('admin.team.edit')
            ->with([
                'team'=>$team,
                'admins'=>Admin::all(),
                'panelNames'=>TeamPanelName::all()
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'panel_name'=>['required'],
            'name'=>['required','max:255'],
            'designation'=>['required','max:255'],
            'image'=>['nullable','mimes:jpeg,bmp,png,jpg','max:2048'],
            'facebook'=>['nullable','url'],
            'twitter'=>['nullable','url'],
            'linkedin'=>['nullable','url'],
            'gmail'=>['nullable','url'],
        ]);
        $team = Team::where('id',$id)->first();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageNameThumb = 'Team_main_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/team/main');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(270,270)
                ->save($destination.'/'.$imageNameThumb);
            @unlink('uploads/team/main/'.$team->image);
            $team->panel_name_id = $request->panel_name;
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->image = $imageNameThumb;
            $team->facebook = $request->facebook;
            $team->twitter = $request->twitter;
            $team->linkedin = $request->linkedin;
            $team->gmail = $request->gmail;
            $team->status = $request->status;
            $team->updated_by = \Auth::user()->id;
            $team->save();
            toast('Team Edit Successfully','success');
            return redirect()->route('admin.team.index');
        }else{
            $team->panel_name_id = $request->panel_name;
            $team->name = $request->name;
            $team->designation = $request->designation;
            $team->facebook = $request->facebook;
            $team->twitter = $request->twitter;
            $team->linkedin = $request->linkedin;
            $team->gmail = $request->gmail;
            $team->status = $request->status;
            $team->updated_by = \Auth::user()->id;
            $team->save();
            toast('Team Edit Successfully','success');
            return redirect()->route('admin.team.index');
        }
    }

    public function delete($id)
    {
        $team = Team::where('id',$id)->first();
        $team->deleted_by = \Auth::user()->id;
        $team->save();
        $team->delete();
        alert()->success('Success','Blog delete Successful...!!!');
        return redirect()->back();
    }

    public function trashIndex()
    {
        $teams = Team::with('teamPanelNames')->onlyTrashed()->get();

        return view('admin.team.trash')
            ->with([
                'teams'=>$teams,
                'admins'=>Admin::all()
            ]);
    }
    public function restore($id)
    {
        $team = Team::withTrashed()->where('id',$id)->restore();
        toast('Team restore successful...!!!','success');
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $team = Team::withTrashed()->where('id',$id)->first();
        @unlink('uploads/team/main/'.$team->image);
        $team->forceDelete();
        toast('Team Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
}
