@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Partner</h2>
            <a href="{{route('admin.partner.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Partners List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.partner.update',['id'=>$partner->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Partner Name : </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Partner Name" autocomplete="off" value="{{$partner->title}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="url">Partner Url : </label>
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="Ex: https://example.com (Optional)" autocomplete="off" value="{{$partner->url}}">
                    @error('url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url('uploads/partner/main/'.$partner->logo)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 130px;height: auto;" src="{{url('uploads/partner/main/'.$partner->logo)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="logo">Partner Logo : (Max : 1MB)</label>
                    <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" >
                    @error('logo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option @if($partner->status === 1) selected @endif value="1">Active</option>
                        <option @if($partner->status === 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Update</button>
            </form>
        </div>
    </div>
@endsection
