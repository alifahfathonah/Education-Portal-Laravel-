<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Frontend\Upload;
use App\User;

class UserDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function pending()
    {
        return view('admin.document.pending')
            ->with([
                'documents'=>Upload::where('status',0)->orderByDesc('id')->paginate(20),
                'users'=>User::all()
            ]);
    }

    public function reject()
    {
        return view('admin.document.reject')
            ->with([
                'documents'=>Upload::where('status',2)->orderByDesc('id')->paginate(20),
                'users'=>User::all()
            ]);
    }

    public function deleteDocument($id)
    {
        $document = Upload::where('id',$id)->first();
        @unlink($document->file);
        $document->delete();
        alert()->success('Success','Document delete Successfully..');
        return redirect()->back();
    }

    public function rejectDocument($id)
    {
        $document = Upload::where('id',$id)->first();
        $document->status = 2;
        $document->save();
        alert()->success('Success','Document Reject Successfully');
        return redirect()->back();
    }

    public function approve()
    {
        return view('admin.document.approve')
            ->with([
                'documents'=>Upload::where('status',1)->orderByDesc('id')->paginate(20),
                'users'=>User::all()
            ]);
    }

    public function approveDocument($id)
    {
        $document = Upload::where('id',$id)->first();
        $document->status = 1;
        $document->save();
        alert()->success('Success','Document Approve Successfully');
        return redirect()->back();
    }
}
