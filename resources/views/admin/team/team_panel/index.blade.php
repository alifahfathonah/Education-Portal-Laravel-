@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Team Panel Name</h2>
            <a href="{{route('admin.team.panel.create')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-plus"></i> Add Panel Name
            </a>
        </div>
        <div class="card-body">
            <div class="hoverable-data-table">
                <table id="hoverable-data-table" class="table table-hover nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($panels as $panel)
                        <tr>
                            <td>@if($loop->index + 1 <10){{'0'.($loop->index+1)}}@endif @if($loop->index + 1 > 9){{($loop->index+1)}}@endif</td>
                            <td>{{$panel->name}}</td>

                            <td>@if ($panel->status == 1) <span class="mb-2 mr-2 badge badge-success">Active</span>@elseif($panel->status == 0)<span class="mb-2 mr-2 badge badge-warning"> Inactive </span> @else <span class="mb-2 mr-2 badge badge-danger"> Unknown </span>@endif</td>
                            <td>
                                @if($panel->created_by === null)
                                    {{__('Null')}}
                                @else
                                    @foreach($admins as $admin)
                                        @if($panel->created_by == $admin->id)
                                            {{$admin->name}}
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($panel->updated_by === null)
                                    {{__('Null')}}
                                @else
                                    @foreach($admins as $admin)
                                        @if($panel->updated_by == $admin->id)
                                            {{$admin->name}}
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a data-toggle="tooltip" title="Edit" href="{{route('admin.team.panel.edit',['id'=>$panel->id])}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a  data-toggle="tooltip" title="Trash" href="{{route('admin.team.panel.delete',['id'=>$panel->id])}}" class="btn btn-sm btn-danger delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
            $(document).on('click','.delete',function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete Skill?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = link;
                    }
                })
            })
        });
    </script>
@endsection
@section('css')
    <link href="{{asset('backend/assets/plugins/data-tables/datatables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
