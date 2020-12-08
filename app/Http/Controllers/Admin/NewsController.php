<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller implements ComponentCRUD
{
    public function index()
    {
        return view('admin.single.news.index')
            ->with([
                'newses'=>News::orderByDesc('id')->get(),
                'admins'=>Admin::all()
            ]);
    }

    public function create()
    {
        return view('admin.single.news.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'image'=>['required','mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required'],
        ]);

        //Image and Thumb upload and resize
        $image = $request->file('image');
        $imageNameThumb = 'News_thumb_'.time().'_'.$request->image->getClientOriginalName();
        $imageName = 'News_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/news/thumb');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(370,246)->save($destination.'/'.$imageNameThumb);
        $realImageDestination = public_path('uploads/news/main');
        $image->move($realImageDestination,$imageName);

        $news = new News();
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->thumb = 'uploads/news/thumb/'.$imageNameThumb;
        $news->image = 'uploads/news/main/'.$imageName;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->created_by = \Auth::id();
        $news->save();
        toast('News Added Successfully','success');
        return redirect()->route('admin.news.index');
    }

    public function edit($id)
    {
        $news = News::where('id',$id)->first();
        return view('admin.single.news.edit')
            ->with([
               'news'=> $news
            ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'image'=>['nullable','mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required'],
        ]);
        $news = News::where('id',$id)->first();
        if ($request->hasFile('image')){
            //Image and Thumb upload and resize
            $image = $request->file('image');
            $imageNameThumb = 'News_thumb_'.time().'_'.$request->image->getClientOriginalName();
            $imageName = 'News_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/news/thumb');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(370,246)->save($destination.'/'.$imageNameThumb);
            $realImageDestination = public_path('uploads/news/main');
            $image->move($realImageDestination,$imageName);
            @unlink($news->image);
            @unlink($news->thumb);

            $news->title = $request->title;
            $news->slug = Str::slug($request->title);
            $news->thumb = 'uploads/news/thumb/'.$imageNameThumb;
            $news->image = 'uploads/news/main/'.$imageName;
            $news->description = $request->description;
            $news->status = $request->status;
            $news->updated_by = \Auth::id();
            $news->save();
            alert()->success('Success','News Updated Successfully');
            return redirect()->route('admin.news.index');
        }else{
            $news->title = $request->title;
            $news->slug = Str::slug($request->title);
            $news->description = $request->description;
            $news->status = $request->status;
            $news->updated_by = \Auth::id();
            $news->save();
            alert()->success('Success','News Updated Successfully');
            return redirect()->route('admin.news.index');
        }
    }

    public function delete($id)
    {
        $news = News::where('id',$id)->first();
        @unlink($news->image);
        @unlink($news->thumb);
        $news->delete();
        alert()->success('Success','News Delete Successfully');
        return redirect()->route('admin.news.index');
    }
}
