<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        return view('admin.information.admission.index')
            ->with([
                'admissions'=>Admission::orderByDesc('id')->get(),
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.information.admission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:191'],
            'url'=>['required','max:191','url'],
            'logo'=>['required','mimes:jpeg,png,jpg','max:1024'],
        ]);
        //Image and Thumb upload and resize
        $admission = new Admission();
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move('uploads/information/admission/',$filename);
            $admission->logo = 'uploads/information/admission/'.$filename;
        }

        $admission->title = $request->title;
        $admission->url = $request->url;
        $admission->status = $request->status;
        $admission->created_by = \Auth::id();
        $admission->save();
        toast('Admission Added Successfully','success');
        return redirect()->route('admin.information.admission.index');
    }

    public function edit($id)
    {

        return view('admin.information.admission.edit')
            ->with([
                'admission'=>Admission::where('id',$id)->first()
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:191'],
            'url'=>['required','max:191','url'],
            'logo'=>['nullable','mimes:jpeg,png,jpg','max:1024'],
        ]);
        $admission = Admission::where('id',$id)->first();
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move('uploads/information/admission/',$filename);
            @unlink($admission->logo);
            $admission->logo = 'uploads/information/admission/'.$filename;
            $admission->title = $request->title;
            $admission->url = $request->url;
            $admission->status = $request->status;
            $admission->updated_by = \Auth::id();
            $admission->save();
            alert()->success('Success','Admission update Successfully');
            return redirect()->route('admin.information.admission.index');
        }else{
            $admission->title = $request->title;
            $admission->url = $request->url;
            $admission->status = $request->status;
            $admission->updated_by = \Auth::id();
            $admission->save();
            alert()->success('Success','Admission update Successfully');
            return redirect()->route('admin.information.admission.index');
        }
    }

    public function delete($id)
    {
        $admission = Admission::where('id',$id)->first();
        @unlink($admission->logo);
        $admission->delete();
        alert()->success('Success','Admission delete Successfully');
        return redirect()->route('admin.information.admission.index');
    }
}
