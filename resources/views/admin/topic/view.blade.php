@extends('admin.layout.app')

@section('pageTitle', 'Dashboard')

@section('content')

<div id="main-wrapper">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Topic</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
                    <li class="breadcrumb-item active">Topic</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Topic</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name Topic</th>
                                    <th>Tag</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($topic as $topics)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $topics->name_topic }}</td>
                                    <td>{{ $topics->tag_name }}</td>
                                    <td>{{ $topics->description }}</td>
                                    <td>{{ $topics->category->name_category }}</td>
                                    <td style="display: flex;">
                                        <button type="button" class="btn btn-info">
                                            <a style="color: white;" href="{{ route('edit.topic', $topics->id) }}">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                        </button>
                                        <form style="padding-left: 6px;" method="post" action="{{ route('destroy.topic', $topics->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
</div>
@section('add_js')

<script src="{{ asset('admin/plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('admin/plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
        });
    });
</script>

@endsection

@endsection
