@extends('frontend.layouts.innerapp')
@section('page-name')
    Upload Document
@endsection
@section('main-content')
    <section class="modeltest-area">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="home-section">
                        <div class="section-title">
                            <h2>Upload Your Document</h2>
                        </div>
                        <div class="section-content">
                            <form action="{{route('user.document.store')}}" method="post" enctype="multipart/form-data">@csrf
                                <div class="form-group">
                                    <label for="title">Document Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                    @error('title') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Select Document Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select Document Type</option>
                                        <option value="Exam Question">Exam Question</option>
                                        <option value="Exam Question Solution">Exam Question Solution</option>
                                        <option value="Document">Other Document</option>
                                    </select>
                                    @error('type') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group" id="other">

                                </div>
                                <div class="form-group">
                                    <label for="department">Select Department</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value="">Select Department</option>
                                        <option value="CSE">CSE</option>
                                        <option value="EEE">EEE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IIT">IIT</option>
                                    </select>
                                    @error('department') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="comment">Your Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Your Comment(Optional)"></textarea>
                                </div>
                                <div class="form-group" id="file-upload">
                                    <label for="demo">Upload File : (Ex: JPG, PNG, JPEG, Pdf, Doc, Xlsx)</label>
                                    <div class="file-up">
                                        <input id="demo" type="file" name="files[]" class="form-control @error('files') is-invalid @enderror " style="height: 45px;width: 92%;float: left;margin-right: 10px;" required value="{{old('file')}}">
                                        <button type="button" class="btn btn-success add"  style="padding: 2px 13px;font-size: 25px;"><i class="fa fa-plus"></i></button>
                                        @error('files') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload File</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script>
        $(function (){
            "use strict"
            $(document).on('change','#type',function (){
                $('#other').empty();
                if ($(this).val() === 'Document'){
                    $('#other').empty();
                    $('#other').append('<label for="other_document">Select Other Document Type</label>\n' +
                        '                                <select name="other_document" id="other_document" class="form-control" required>\n' +
                        '                                    <option value="">Select other document Type</option>\n' +
                        '                                    <option value="Department Book">Department Book</option>\n' +
                        '                                    <option value="Department sheet or node">Department sheet or node</option>\n' +
                        '                                    <option value="Others job guide">Others job guide</option>\n' +
                        '                                </select>');

                }else{
                    $('#other').empty();
                }
            });
        });
    </script>
    <script>
        $(function (){
            "use strict"
            $(document).on('click','.add',function (){
                $(this).closest('div').parent('div').append('<div class="file-up" style="margin-top: 10px;">\n' +
                    '                                        <input id="demo" type="file" name="files[]" class="form-control" style="height: 45px;width: 92%;float: left;margin-right: 10px;" required>\n' +
                    '                                        <button type="button" class="btn btn-danger remove"  style="padding: 2px 13px;font-size: 25px;"><i class="fa fa-remove"></i></button>\n' +
                    '                                    </div>');
            });
            $(document).on('click','.remove',function (){
                $(this).closest('div').remove();
            });
        });
    </script>
@endsection
