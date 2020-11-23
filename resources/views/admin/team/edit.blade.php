@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Edit Team</h2>
            <a href="{{route('admin.team.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Team List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.team.update',['id'=>$team->id])}}" method="post" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="panel_name">Panel Name :</label>
                    <select name="panel_name" id="panel_name" class="form-control @error('panel_name') is-invalid @enderror">
                        <option value="">Please Select a Panel Name</option>
                        @foreach($panelNames as $panelName)
                            <option @if($panelName->id === $team->panel_name_id) selected @endif value="{{$panelName->id}}">{{$panelName->name}}</option>
                        @endforeach
                    </select>
                    @error('panel_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Employee Name" autocomplete="off" value="{{$team->name}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="designation">Designation : </label>
                    <input id="designation" type="text"  class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Employee Designation" autocomplete="off" value="{{$team->designation }}">
                    @error('designation')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label style="display: block" for="exampleFormControlFile2">Current Image : <a target="_blank" class="btn btn-warning pull-right" href="{{url('uploads/team/main/'.$team->image)}}"><i class="fa fa-eye"></i> View Large Image</a></label>
                    <img style="max-width: 130px;height: auto;" src="{{url('uploads/team/main/'.$team->image)}}" alt="">
                </div>
                <div class="form-group">
                    <label for="image">Employee Image : </label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label class="text-dark font-weight-normal" for="facebook">Facebook profile link :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-facebook"></i>
                            </span>
                        </div>
                        <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Ex: https://facebook.com/profile (Optional)" aria-label="Username" value="{{$team->facebook}}">
                        @error('facebook')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-dark font-weight-normal" for="twitter">Twitter profile link :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-twitter"></i>
                            </span>
                        </div>
                        <input type="text" name="twitter" id="twitter" class="form-control  @error('twitter') is-invalid @enderror" placeholder="Ex: https://twitter.com/profile (Optional)" aria-label="Username" value="{{$team->twitter}}">
                        @error('twitter')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-dark font-weight-normal" for="linkedin">LinkedIn profile link :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </div>
                        <input type="text" name="linkedin" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="Ex: https://linkedin.com/profile (Optional)" aria-label="Username" value="{{$team->linkedin}}">
                        @error('linkedin')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-dark font-weight-normal" for="gmail">Gmail profile link :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <input type="text" name="gmail" id="gmail" class="form-control @error('gmail') is-invalid @enderror" placeholder="Ex: https://gmail.com/profile (Optional)" aria-label="Username" value="{{$team->gmail}}">
                        @error('gmail')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Select Status :</label>
                    <select name="status" id="status" class="form-control">
                        <option @if($team->status === 1) selected @endif value="1">Active</option>
                        <option @if($team->status === 0) selected @endif value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Update</button>
            </form>
        </div>
    </div>
@endsection
