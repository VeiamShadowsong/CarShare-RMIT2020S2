@extends('layout.userLayout')

@section('css')
    <link href="{{asset('resources/theme/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <!-- BEGIN: Header -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Order Manager</h3>
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
                            <h3 class="m-portlet__head-text" id="table-title">Your Order List</h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="order-table">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Make</th>
                            <th>Type</th>
                            <th>Color</th>
                            <th>Owner</th>
                            <th>Ordered at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->car->number}}</td>
                                <td>{{$order->car->make->name}}</td>
                                <td>{{$order->car->type}}</td>
                                <td>{{$order->car->color}}</td>
                                <td>{{$order->car->user->first_name}} {{$order->car->user->last_name}}</td>
                                <td>{{$order->created_at}}</td>
                                <td nowrap>
                        <span class="dropdown">
                           <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                           <i class="la la-ellipsis-h"></i>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{url('/admin/order/order-detail/' . $order->car->id)}}"><i class="la la-edit"></i> Edit Details</a>
                              <a class="dropdown-item cancel-order" data-toggle="modal" data-order-id="{{$order->car->id}}"><i class="la la-trash"></i> Cancel</a>
                           </div>
                        </span>
                                    <a href="{{url('/admin/order/order-detail/' . $order->car->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
        <div class="modal fade" id="cancel-order" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Confirm you want to cancel this order?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="cancelOrder()">Cancel</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input id="cancel-order-id" style="display: none;"/>
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
            var initOrderTable = function() {
                var table = $('#order-table');
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
                    initOrderTable();
                },

            };

        }();

        DatatablesColumnRendering.init();
    </script>

    <script type="text/javascript">
        $(document).on("click", ".cancel-order", function() {
            var orderId = $(this).data('order-id');
            $("#cancel-order-id").val(orderId);
            $('#cancel-order').modal('show');
        });

        function cancelOrder() {
            var orderId = $(".modal-footer #cancel-order-id").val();
            $.get("{{url('/admin/order/cancel-order/')}}/" + orderId, {
                '_method': 'cancel',
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