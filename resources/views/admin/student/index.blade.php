@extends('layouts.admin.app')
@section('title', 'Student')
@section('user', 'active')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row col-12 mb-2">
                <div class="col-sm-6">
                    <h1>All Students</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title float-right">
                                <a href="{{ route('admin.student.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add Student
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="Student" class="table table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Roll</th>
                                        <th class="hidden">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $student)
                                        <tr>
                                            <td>{{ ++$id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->class }}</td>
                                            <td>{{ $student->roll }}</td>
                                            <td>
                                                <div class="d-inline-flex">

                                                    <a href="{{ route('admin.student.edit', $student->id) }}"
                                                        class="btn btn-primary btn-sm" title="Edit Student">
                                                        <i class="fa fa-edit iCheck"></i>&nbsp;Edit Student
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#Student").DataTable({
                "responsive": false,
                "autoWidth": false,
                "dom": 'lBfrtip',
                "buttons": [{
                        extend: 'collection',
                        text: "<i class='fa fa-ellipsis-v'></i>",
                        buttons: [{
                                extend: 'copy',
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: 'csv',

                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: 'excel',

                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: 'pdf',

                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: 'print',

                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                },

                            },
                        ],

                    },
                    {
                        extend: 'colvis',
                        columns: ':not(.hidden)'
                    }
                ],

                "language": {
                    "infoEmpty": "No entries to show",
                    "emptyTable": "No data available",
                    "zeroRecords": "No records to display",
                }
            });
            dataTablePosition();
        });

        function updateStatus(id, el) {
            console.log(el);
            if (id) {
                $.ajax({
                    url: "{{ route('admin.student.index') }}",
                    type: 'POST',
                    data: {
                        'user_id': id
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            el.text('Inactive');
                            el.removeClass('badge-success').addClass('badge-warning');
                        } else if (data.status == 1) {
                            el.text('Active');
                            el.removeClass('badge-warning').addClass('badge-success');
                        }
                        toastr.success(data.msg);
                    }
                });
            }
        }
    </script>
@endsection
