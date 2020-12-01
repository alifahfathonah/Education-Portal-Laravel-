<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Partner;
use Illuminate\Http\Request;
use function React\Promise\all;

class PartnerController extends Controller implements ComponentCRUD
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $partner = Partner::orderByDesc('id')->get();
        return view('admin.partner.index')
            ->with([
                'partners'=>$partner,
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:255'],
            'url'=>['nullable','url','max:255'],
            'logo'=>['required','mimes:jpeg,bmp,png,jpg','max:1024'],
        ]);
        //Image and Thumb upload and resize
        $image = $request->file('logo');
        $imageNameThumb = 'Partner_main_'.time().'_'.$request->logo->getClientOriginalName();
        $destination = public_path('uploads/partner/main');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(140,60)
            ->save($destination.'/'.$imageNameThumb);
        $partner = new Partner();
        $partner->title = $request->title;
        $partner->url = $request->url;
        $partner->logo = $imageNameThumb;
        $partner->status = $request->status;
        $partner->created_by = \Auth::user()->id;
        $partner->save();
        toast('Partner create Successfully','success');
        return redirect()->route('admin.partner.index');
    }

    public function delete($id)
    {
        $partner = Partner::where('id',$id)->first();
        $partner->deleted_by = \Auth::user()->id;
        $partner->save();
        $partner->delete();
        alert()->success('Success','Partner delete Successful...!!!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $partner  = Partner::where('id',$id)->first();
        return view('admin.partner.edit')
            ->with([
                'partner'=>$partner
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required','max:255'],
            'url'=>['nullable','url','max:255'],
            'logo'=>['nullable','mimes:jpeg,bmp,png,jpg','max:1024'],
        ]);
        $partner = Partner::where('id',$id)->first();
        if ($request->hasFile('logo')){
            $image = $request->file('logo');
            $imageNameThumb = 'Partner_main_'.time().'_'.$request->logo->getClientOriginalName();
            $destination = public_path('uploads/partner/main');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(140,60)
                ->save($destination.'/'.$imageNameThumb);
            @unlink('uploads/partner/main/'.$partner->logo);
            $partner->title = $request->title;
            $partner->url = $request->url;
            $partner->logo = $imageNameThumb;
            $partner->status = $request->status;
            $partner->updated_by = \Auth::user()->id;
            $partner->save();
            alert()->success('Success','Partner update Successful...!!!');
            return redirect()->route('admin.partner.index');
        }else{
            $partner->title = $request->title;
            $partner->url = $request->url;
            $partner->status = $request->status;
            $partner->updated_by = \Auth::user()->id;
            $partner->save();
            alert()->success('Success','Partner update Successful...!!!');
            return redirect()->route('admin.partner.index');
        }

    }

    public function trashIndex()
    {
        $partners = Partner::onlyTrashed()->get();
        return view('admin.partner.trash')
            ->with([
                'partners'=>$partners,
                'admins'=>Admin::all()
            ]);
    }

    public function restore($id)
    {
        $partner = Partner::withTrashed()->where('id',$id)->restore();
        toast('Partner restore successful...!!!','success');
        return redirect()->back();

    }

    public function forceDelete($id)
    {
        $partner = Partner::withTrashed()->where('id',$id)->first();
        @unlink('uploads/partner/main/'.$partner->logo);
        $partner->forceDelete();
        toast('Partner Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
}
