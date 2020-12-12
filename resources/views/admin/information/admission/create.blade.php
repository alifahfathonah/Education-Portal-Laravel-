@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Admission</h2>
            <a href="{{route('admin.information.admission.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Admission List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.information.admission.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">University Name : </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="University Name" autocomplete="off" value="{{old('title')}}">
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="logo">University Logo : (Max : 1MB)</label>
                    <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" >
                    @error('logo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="url">Admission  Url : </label>
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="Ex: https://example.com (Optional)" autocomplete="off" value="{{old('url')}}">
                    @error('url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
