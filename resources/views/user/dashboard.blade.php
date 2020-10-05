@extends('layout.userLayout')

@section('body')
    <!-- BEGIN: Header -->
    <div class="m-subheader">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Dashboard</h3>
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
                            <h3 class="m-portlet__head-text" id="table-title">Report</h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-portlet__body  m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            <div class="col-xl-4">

                                <!--begin:: Widgets/Stats2-1 -->
                                <div class="m-widget1">
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Order Profit</h3>
                                                <span class="m-widget1__desc">Total order count</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-brand">{{$orderCount}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Cars</h3>
                                                <span class="m-widget1__desc">Total car count</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-danger">{{$carCount}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Cost Reports</h3>
                                                <span class="m-widget1__desc">Total cost value</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-danger">-${{$cost}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Stats2-1 -->
                            </div>
                            <div class="col-xl-4">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="m-widget14">
                                    <div class="m-widget14__header m--margin-bottom-30">
                                        <h3 class="m-widget14__title">
                                            Daily Cost
                                        </h3>
                                        <span class="m-widget14__desc">
													Check out daily spend
												</span>
                                    </div>
                                    <div class="m-widget14__chart" style="height:120px;">
                                        <canvas id="m_chart_daily_sales"></canvas>
                                    </div>
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                            <div class="col-xl-4">

                                <!--begin:: Widgets/Profit Share-->
                                <div class="m-widget14">
                                    <div class="m-widget14__header">
                                        <h3 class="m-widget14__title">
                                           Near by
                                        </h3>
                                        <span class="m-widget14__desc">
                                            Car share around you
												</span>
                                    </div>
                                    <div class="row  align-items-center">
                                        <div class="col">
                                            <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                                <div class="m-widget14__stat">30</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-widget14__legends">
                                                <div class="m-widget14__legend">
                                                    <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                                    <span class="m-widget14__legend-text">10 Parking</span>
                                                </div>
                                                <div class="m-widget14__legend">
                                                    <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                                    <span class="m-widget14__legend-text">10 Cars</span>
                                                </div>
                                                <div class="m-widget14__legend">
                                                    <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                                    <span class="m-widget14__legend-text">10 Users</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Profit Share-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Section-->
    </div>
@endsection


@section('script')
    <script src="{{asset('resources/theme/assets/app/js/dashboard.js')}}"></script>
@endsection