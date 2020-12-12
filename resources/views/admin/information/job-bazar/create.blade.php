@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Job</h2>
            <a href="{{route('admin.information.jobbazar.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Job List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.information.jobbazar.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Job Title : </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Job Title" autocomplete="off" value="{{old('title')}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="logo">Company Logo : (Max : 1MB)</label>
                    <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" >
                    @error('logo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="comany_name">Company Name : </label>
                    <input id="comany_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="Company Name" autocomplete="off" value="{{old('company_name')}}">
                    @error('company_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="location">Company Location : </label>
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Company Location" autocomplete="off" value="{{old('location')}}">
                    @error('location')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group">
                    <label for="description">Job Description</label>
                    <textarea name="description" id="description" class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Save</button>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#description').summernote({
            height:500
        });
    </script>
@endsection
