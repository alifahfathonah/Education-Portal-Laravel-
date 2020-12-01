<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\TeamPanelName;
use Illuminate\Http\Request;

class TeamPanelNameController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $panelName = TeamPanelName::orderByDesc('id')->get();
        return view('admin.team.team_panel.index')
            ->with([
                'panels'=>$panelName,
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.team.team_panel.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>['required','max:255']
        ]);
        $panelName = new TeamPanelName();
        $panelName->name = $request->name;
        $panelName->status = $request->status;
        $panelName->created_by = \Auth::user()->id;
        $panelName->save();
        toast('Panel name save Successfully','success');
        return redirect()->route('admin.team.panel.index');
    }

    public function edit($id)
    {
        $panelName = TeamPanelName::where('id',$id)->first();
        return view('admin.team.team_panel.edit')
            ->with([
                'panelName' => $panelName
            ]);
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255']
        ]);
        $panelName = TeamPanelName::where('id',$id)->first();
        $panelName->name = $request->name;
        $panelName->status = $request->status;
        $panelName->updated_by = \Auth::user()->id;
        $panelName->save();
        toast('Panel Name update Successfully..!!','success');
        return redirect()->route('admin.team.panel.index');
    }

    public function delete($id)
    {
        $panelName = TeamPanelName::where('id',$id)->first();
        $panelName->deleted_by = \Auth::user()->id;
        $panelName->save();
        $panelName->delete();
        alert()->success('Success','Team panel name delete Successful...!!!');
        return redirect()->back();
    }

    public function trashIndex()
    {
        $panelName = TeamPanelName::onlyTrashed()->orderByDesc('id')->get();
        return view('admin.team.team_panel.trash')
            ->with([
                'panels'=>$panelName,
                'admins'=>Admin::all()
            ]);
    }
    public function restore($id)
    {
        $panelName = TeamPanelName::withTrashed()->where('id',$id)->restore();
        toast('Team Panel Name restore successful...!!!','success');
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $panelName = TeamPanelName::withTrashed()->where('id',$id)->first();
        $panelName->forceDelete();
        toast('Team Panel Name Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
}
