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
    <div id="map"></div>
@endsection

@section('script')
    <script>
        "use strict";

        function initMap() {
            // Map
            const qv = new google.maps.LatLng({{env('DEFAULT_LAT')}}, {{env('DEFAULT_LNG')}});
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: qv
            });

            // User
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

            // Cars
            var cars = [];
            @foreach($cars as $car)
            cars.push([
                new google.maps.Marker({
                    position: new google.maps.LatLng({{$car->lat}}, {{$car->lng}}),
                    map,
                    title: "{{$car->number}}"
                }),
                new google.maps.InfoWindow({
                    content:
                        '<div id="content">' +
                        '<div id="siteNotice">' +
                        "</div>" +
                        '<h1 class="firstHeading">{{$car->number}}</h1>' +
                        '<div>' +
                        "<p><b>Make: </b>{{$car->make->name}}</p>" +
                        "<p><b>Type: </b>{{$car->type}}</p>" +
                        "<p><b>Color: </b>{{$car->color}}</p>" +
                        "<p><b>Status: </b>{{$car->status}}</p>" +
                        "<p><b>Owner: </b>{{$car->user->first_name}} {{$car->user->last_name}}</p>" +
                            @if($car->status == 'free')
                            `<a href="{{url('/cars/order')}}/{{$car->id}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">Order</a>` +
                            @elseif($car->status == 'ordered')
                            `<button class="btn btn-metal m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" disabled>Ordered</button>` +
                            @endif
                                "</div>" +
                        "</div>"
                })
            ]);
            @endforeach
            for(let i = 0; i < cars.length; i++) {
                cars[i][0].addListener("click", () => {
                    cars[i][1].open(map, cars[i][0]);
                });
            }

            // Parkings
            var parkings = [];
            @foreach($parkings as $parking)
            parkings.push([
                new google.maps.Marker({
                    position: new google.maps.LatLng({{$parking->lat}}, {{$parking->lng}}),
                    map,
                    title: "{{$parking->name}}"
                }),
                new google.maps.InfoWindow({
                    content:
                        '<div id="content">' +
                        '<div id="siteNotice">' +
                        "</div>" +
                        '<h1 class="firstHeading">{{$parking->name}}</h1>' +
                        '<div>' +
                        "<p><b>Address: </b>{{$parking->address}}</p>" +
                        "</div>"
                })
            ]);
            @endforeach
            for(let i = 0; i < parkings.length; i++) {
                parkings[i][0].addListener("click", () => {
                    parkings[i][1].open(map, parkings[i][0]);
                });
            }
        }

        initMap()
    </script>
@endsection