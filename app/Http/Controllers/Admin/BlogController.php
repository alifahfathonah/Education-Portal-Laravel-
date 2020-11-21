<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Blog;
use App\Model\Admin\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //For Blog Categies
    public function categoryIndex()
    {
        $categories = BlogCategory::orderByDesc('id')->get();
        $admins = Admin::all();
        return view('admin.blog.category_index')
            ->with([
                'categories'=>$categories,
                'admins'=>$admins

            ]);
    }

    public function categoryCreate()
    {
        return view('admin.blog.category_create');
    }

    public function categoryStore(Request  $request)
    {
        $this->validate($request,[
           'name'=>['required','max:255','string']
        ]);
        $category = new BlogCategory();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->created_by = \Auth::user()->id;
        $category->save();
        toast('Blog Category Create Successful...!!!','success');
        return redirect()->route('admin.blog.category.index');
    }
    public function categoryDelete($id)
    {
        $category = BlogCategory::where('id',$id)->first();
        $category->deleted_by = \Auth::user()->id;
        $category->save();
        $category->delete();
        alert()->success('Success','Blog Category delete Successful...!!!');
        return redirect()->back();
    }

    public function categoryEdit($id)
    {
        $category = BlogCategory::where('id',$id)->first();
        return view('admin.blog.category_edit')
            ->with([
                'category'=>$category
            ]);
    }

    public function categoryUpdate($id, Request $request)
    {
        $this->validate($request,[
            'name'=>['required','max:255','string']
        ]);
        $category = BlogCategory::where('id',$id)->first();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->updated_by = \Auth::user()->id;
        $category->save();
        toast('Blog Category Update Successful...!!!','success');
        return redirect()->route('admin.blog.category.index');
    }
    public function categoryTrash()
    {
        $category = BlogCategory::onlyTrashed()->get();
        $admins = Admin::all();
        return view('admin.blog.category_trash')
            ->with([
                'categories'=>$category,
                'admins'=>$admins
            ]);
    }

    public function categoryRestore($id)
    {
        $category = BlogCategory::withTrashed()->where('id',$id)->restore();
        toast('Category restore successful...!!!','success');
        return redirect()->back();
    }

    public function categoryForceDelete($id)
    {
        $category = BlogCategory::withTrashed()->where('id',$id)->first();
        $category->forceDelete();
        toast('Category Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
    //For blog
    public function index()
    {
        $blog = Blog::with('blogcategories')->orderByDesc('id')->get();
        $admins = Admin::all();
        return view('admin.blog.index')
            ->with([
                'blogs'=>$blog,
                'admins'=>$admins
            ]);
    }

    public function create()
    {
        $categories = BlogCategory::where('status',1)->get();
        return view('admin.blog.create')
            ->with([
                'categories'=>$categories
            ]);
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
        $imageNameThumb = 'Blog_thumb_'.time().'_'.$request->image->getClientOriginalName();
        $imageName = 'Blog_'.time().'_'.$request->image->getClientOriginalName();
        $destination = public_path('uploads/blog/thumb');
        $resizeImage = \Image::make($image->getRealPath())
            ->resize(370,246)->save($destination.'/'.$imageNameThumb);
        $realImageDestination = public_path('uploads/blog/main');
        $image->move($realImageDestination,$imageName);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->image = $imageName;
        $blog->thumb = $imageNameThumb;
        $blog->description = $request->description;
        $blog->category = $request->category;
        $blog->status = $request->status;
        $blog->created_by = \Auth::user()->id;
        $blog->save();
        toast('Blog Added Successfully','success');
        return redirect()->route('admin.blog.index');
    }

    public function delete($id)
    {
        $blog = Blog::where('id',$id)->first();
        $blog->deleted_by = \Auth::user()->id;
        $blog->save();
        $blog->delete();
        alert()->success('Success','Blog delete Successful...!!!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();
        $categories = BlogCategory::where('status',1)->get();
        return view('admin.blog.edit')->with([
            'blog'=>$blog,
            'categories'=>$categories
        ]);
    }

    public function update($id, Request  $request)
    {
        $this->validate($request,[
            'title'=>['required'],
            'category'=>['required'],
            'image'=>['mimes:jpeg,bmp,png,jpg','max:2048'],
            'description'=>['required'],
        ]);
        if ($request->hasFile('image')){
            //Image and Thumb upload and resize
            $blog = Blog::where('id',$id)->first();
            $image = $request->file('image');
            $imageNameThumb = 'Blog_thumb_'.time().'_'.$request->image->getClientOriginalName();
            $imageName = 'Blog_'.time().'_'.$request->image->getClientOriginalName();
            $destination = public_path('uploads/blog/thumb');
            $resizeImage = \Image::make($image->getRealPath())
                ->resize(370,246)->save($destination.'/'.$imageNameThumb);
            $realImageDestination = public_path('uploads/blog/main');
            $image->move($realImageDestination,$imageName);
            @unlink('uploads/blog/main/'.$blog->image);
            @unlink('uploads/blog/thumb/'.$blog->thumb);
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->image = $imageName;
            $blog->thumb = $imageNameThumb;
            $blog->description = $request->description;
            $blog->category = $request->category;
            $blog->status = $request->status;
            $blog->updated_by = \Auth::user()->id;
            $blog->save();
            alert()->success('Success','Blog update Successful...!!!');
            return redirect()->route('admin.blog.index');

        }else{
            $blog = Blog::where('id',$id)->first();
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->description = $request->description;
            $blog->category = $request->category;
            $blog->status = $request->status;
            $blog->updated_by = \Auth::user()->id;
            $blog->save();
            alert()->success('Success','Blog update Successful...!!!');
            return redirect()->route('admin.blog.index');
        }
    }

    public function trashIndex()
    {
        $blogs = Blog::with('blogcategories')->onlyTrashed()->get();
        $admin = Admin::all();
        return view('admin.blog.trash')
            ->with([
                'blogs'=>$blogs,
                'admins'=>$admin
            ]);
    }

    public function restore($id)
    {
        $blog = Blog::withTrashed()->where('id',$id)->restore();
        toast('Blog restore successful...!!!','success');
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $blog = Blog::withTrashed()->where('id',$id)->first();
        @unlink('uploads/blog/main/'.$blog->image);
        @unlink('uploads/blog/thumb/'.$blog->thumb);
        $blog->forceDelete();
        toast('Blog Permanently Delete successful...!!!','success');
        return redirect()->back();
    }
}
