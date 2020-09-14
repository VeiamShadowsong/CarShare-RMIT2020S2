@extends('layout.userLayout')

@section('vendor-script')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap&libraries=&v=weekly" defer></script>
@endsection

@section('css')
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
@endsection

@section('body')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title">Car Order</h3>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                     <span class="m-portlet__head-icon m--hide">
                     <i class="la la-gear"></i>
                     </span>
                                <h3 class="m-portlet__head-text">
                                    Confirm that you want to order: {{$car->number}} - {{$car->make->name}}, {{$car->color}} {{$car->type}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--label-align-right" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <a href="{{url('/cars')}}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Order</button>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <div id="map"></div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        "use strict";

        function initMap() {
            const qv = new google.maps.LatLng(-37.8106277, 144.9634516);
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: qv
            });
            const userInfo = new google.maps.InfoWindow({
                content: "Your position is QV"
            });
            const userMarker = new google.maps.Marker({
                position: qv,
                map,
                title: "Your position"
            });
            userMarker.addListener("click", () => {
                userInfo.open(map, userMarker);
            });

            const car = new google.maps.LatLng({{$car->lat}}, {{$car->lng}});
            const carInfo = new google.maps.InfoWindow({
                content:
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<h1 id="firstHeading" class="firstHeading">{{$car->number}}</h1>' +
                    '<div id="bodyContent">' +
                    "<p><b>Make: </b>{{$car->make->name}}</p>" +
                    "<p><b>Type: </b>{{$car->type}}</p>" +
                    "<p><b>Color: </b>{{$car->color}}</p>" +
                    "<p><b>Status: </b>{{$car->status}}</p>" +
                    "</div>"
            });
            const carMarker = new google.maps.Marker({
                position: car,
                map,
                title: "Car position"
            });
            carMarker.addListener("click", () => {
                carInfo.open(map, userMarker);
            });
        }

        initMap()
    </script>
@endsection