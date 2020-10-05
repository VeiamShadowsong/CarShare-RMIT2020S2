@extends('layout.adminLayout')

@section('css')
    <link href="{{asset('resources/theme/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <!-- BEGIN: Header -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Payment Manager</h3>
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
                            <h3 class="m-portlet__head-text" id="table-title">Payment List</h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="payment-table">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Car</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Gateway</th>
                            <th>Paid at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{$payment->order->user->first_name}} {{$payment->order->user->last_name}}</td>
                                <td>{{$payment->order->car->number}}, {{$payment->order->car->make->name}} {{$payment->order->car->type}} {{$payment->order->car->color}}</td>
                                <td>{{$payment->order->price()}}</td>
                                <td>{{$payment->order->duration()}}</td>
                                <td>{{$payment->gateway}}</td>
                                <td>{{$payment->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End::Section-->
    </div>
@endsection

@section('script')
    <script src="{{asset('resources/theme/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var DatatablesColumnRendering = function() {
            var initPaymentTable = function() {
                var table = $('#payment-table');
                table.DataTable({
                    responsive: true,
                    pageLength: 10,
                    payment: [3, 'desc'],
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
                    initPaymentTable();
                },

            };

        }();

        DatatablesColumnRendering.init();
    </script>
@endsection