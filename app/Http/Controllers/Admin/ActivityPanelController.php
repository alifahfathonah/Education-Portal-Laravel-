<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Activity;
use App\Model\Admin\ActivityPanel;
use App\Model\Admin\ActivityPanelConnection;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;

class ActivityPanelController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.our-activity.panel-name.index')
            ->with([
                'panelNames'=>ActivityPanel::orderByDesc('id')->get(),
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.our-activity.panel-name.create')
            ->with([
                'activities'=> Activity::where('status',1)->get()
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'title'=>['required','max:191']
        ]);
        $panelName = new ActivityPanel();
        $panelName->title = $request->title;
        $panelName->status = $request->status;
        $panelName->created_by = \Auth::id();
        $panelName->save();
        if ($request->activity){
            $panelName->activities()->sync($request->activity);
        }
        toast('Panel Name Added Successful...!','success');
        return redirect()->route('admin.activity.panel.index');
    }
    public function edit($id)
    {
        return view('admin.our-activity.panel-name.edit')
            ->with([
               'panelName'=>ActivityPanel::where('id',$id)->first(),
                'activities'=> Activity::where('status',1)->get()
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:191']
        ]);
        $panelName = ActivityPanel::where('id',$id)->first();
        $panelName->title = $request->title;
        $panelName->status = $request->status;
        $panelName->updated_by = \Auth::id();
        if ($request->activity){
            $panelName->activities()->sync($request->activity);
        }
        $panelName->save();
        toast('Panel Name Update Successful...!','success');
        return redirect()->route('admin.activity.panel.index');
    }


    public function delete($id)
    {
        $activity = ActivityPanel::where('id',$id)->delete();
        alert()->success('success','Activity Panel Deleted Successfully...!');
        return redirect()->back();
    }
}
