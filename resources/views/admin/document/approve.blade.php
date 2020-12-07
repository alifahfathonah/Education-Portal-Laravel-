@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Rejected Document</h2>
        </div>
        <div class="card-body">
            <div >
                <table  class="table table-hover nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Document Type</th>
                        <th>Dept</th>
                        <th>Comment</th>
                        <th>Upload By</th>
                        <th>View</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>@if($loop->index + 1 <10){{'0'.($loop->index+1)}}@endif @if($loop->index + 1 > 9){{($loop->index+1)}}@endif</td>
                            <td>{{$document->title}}</td>
                            <td>{{$document->type}}</td>
                            <td><h5><span class="badge badge-success">{{$document->department}}</span></h5> </td>
                            <td>{{$document->comment ? :'Null'}}</td>
                            <td>
                                @foreach($users as $user)
                                    @if((int)$user->id === (int)$document->created_by)
                                        {{$user->first_name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{url($document->file)}}" download="{{substr($document->file,22,strlen($document->file))}}" class="btn btn-info" data-toggle="tooltip" title="Download"><i class="fa fa-download fa-fw"></i></a>
                            </td>
                            <td>
                                <a href="{{route('admin.document.user.reject.attempt',['id'=>$document->id])}}" class="btn btn-danger reject" data-toggle="tooltip" title="Reject"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    {{$documents->links()}}
                </div>
            </div>
        </div>
        <style>
            table.dataTable.nowrap th, table.dataTable.nowrap td{
                vertical-align: middle;
                color: #000;
            }
        </style>
    </div>
@endsection
@section('js')
    <script src="{{asset('backend/assets/plugins/data-tables/jquery.datatables.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/data-tables/datatables.bootstrap4.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#hoverable-data-table').DataTable({
                "aLengthMenu": [[10,20, 30, 50, 75, -1], [10,20, 30, 50, 75, "All"]],
                "pageLength": 10,
                "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
            });
        });
    </script>
    <script>
        $(function () {
            $(document).on('click','.approve',function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to Reject?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Reject it!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = link;
                    }
                })
            });
            $(document).on('click','.reject',function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to Reject?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Approve it!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = link;
                    }
                })
            });
        });
    </script>
@endsection
@section('css')
    <link href="{{asset('backend/assets/plugins/data-tables/datatables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

