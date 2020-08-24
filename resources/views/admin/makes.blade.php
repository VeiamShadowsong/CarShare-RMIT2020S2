@extends('layout.adminLayout')

@section('css')
    <link href="{{asset('resources/theme/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <!-- BEGIN: Header -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Make Manager</h3>
            </div>
        </div>
    </div>
    <!-- END: Header -->
    <div class="m-content">
        <!--Begin::Section-->
        <div class="row">
            <div class="m-portlet m-portlet--mobile" style="width: 100%;">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text" id="table-title">Make List</h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{url('/admin/makes/new')}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                     <span>
                     <i class="la la-plus"></i>
                     <span>New Make</span>
                     </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="make-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($makes as $make)
                            <tr>
                                <td>{{$make->name}}</td>
                                <td>{{$make->created_at}}</td>
                                <td>{{$make->updated_at}}</td>
                                <td nowrap>
                        <span class="dropdown">
                           <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                           <i class="la la-ellipsis-h"></i>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{url('/admin/make/make-detail/' . $make->id)}}"><i class="la la-edit"></i> Edit Details</a>
                              <a class="dropdown-item delete-make" data-toggle="modal" data-make-id="{{$make->id}}"><i class="la la-trash"></i> Delete</a>
                           </div>
                        </span>
                                    <a href="{{url('/admin/make/make-detail/' . $make->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                                        <i class="la la-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--begin::Modal-->
        <div class="modal fade" id="delete-make" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Make</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Confirm you want to delete this make?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="deleteMake()">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input id="delete-make-id" style="display: none;"/>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
        <!--End::Section-->
    </div>
@endsection

@section('script')
    <script src="{{asset('resources/theme/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var DatatablesColumnRendering = function() {
            var initMakeTable = function() {
                var table = $('#make-table');
                table.DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [3, 'desc'],
                    columnDefs: [{
                        targets: -2,
                        render: function(data, type, full, meta) {
                            var status = {
                                1: {
                                    'title': 'Activited',
                                    'class': ' m-badge--success'
                                },
                                0: {
                                    'title': 'Deactivated',
                                    'class': ' m-badge--danger'
                                },
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="m-badge ' + status[data].class + ' m-badge--wide">' + status[data].title + '</span>';
                        },
                    }, ],
                });
            };

            return {
                init: function() {
                    initMakeTable();
                },

            };

        }();

        DatatablesColumnRendering.init();
    </script>

    <script type="text/javascript">
        $(document).on("click", ".delete-make", function() {
            var makeId = $(this).data('make-id');
            $("#delete-make-id").val(makeId);
            $('#delete-make').modal('show');
        });

        function deleteMMake() {
            var makeId = $(".modal-footer #delete-make-id").val();
            $.get("{{url('/admin/make/delete-make/')}}/" + makeId, {
                '_method': 'delete',
                '_token': "{{csrf_token()}}"
            }, function(response) {
                response = JSON.parse(response);
                if (response.status == 0) {
                    toastr.success(response.msg, "Success");
                    location.reload();
                } else {
                    toastr.error(response.msg, "Fail");
                }
            });
        }
    </script>
@endsection
