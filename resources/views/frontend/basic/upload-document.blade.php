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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Document Title</label>
                                    <input type="text" class="form-control" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="type">Select Document Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select Document Type</option>
                                        <option value="Exam Question">Exam Question</option>
                                        <option value="Exam Question Solution">Exam Question Solution</option>
                                        <option value="Document">Other Document</option>
                                    </select>
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
                                </div>
                                <div class="form-group">
                                    <label for="comment">Your Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Your Comment(Optional)"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="demo">Upload File</label>
                                    <input id="demo" type="file" name="files" accept=".jpg, .png, .pdf,.docx,.csv,.xlxs, image/jpeg, image/png" multiple>
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
@section('css')
    <link rel="stylesheet" href="{{asset('frontend/asset/css/fancy_fileupload.css')}}">
@endsection

@section('js')
    <script src="{{asset('frontend/asset/js/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('frontend/asset/js/jquery.fileupload.js')}}"></script>
    <script src="{{asset('frontend/asset/js/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('frontend/asset/js/jquery.fancy-fileupload.js')}}"></script>
    <script>
        $(function (){
            "use strict"
            $('#demo').FancyFileUpload({
                params : {
                    action : 'fileuploader'
                },
                'edit' :false,
                maxfilesize : 1000000
            });
            $(document).on('change','#type',function (){
                $('#other').empty();
                if ($(this).val() === 'Document'){
                    $('#other').empty();
                    $('#other').append('<label for="other_document">Select Other Document Type</label>\n' +
                        '                                <select name="other_document" id="other_document" class="form-control">\n' +
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
@endsection
