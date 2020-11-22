@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Panel Name</h2>
            <a href="{{route('admin.team.panel.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Panel Name List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.team.panel.update',['id'=>$panelName->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Panel Name : </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Team Panel Name" autocomplete="off" value="{{$panelName->name}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option @if($panelName->status === 1) selected @endif value="1">Active</option>
                        <option @if($panelName->status === 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Save</button>
            </form>
        </div>
    </div>
@endsection
