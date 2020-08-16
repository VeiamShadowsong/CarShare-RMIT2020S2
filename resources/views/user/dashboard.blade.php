@extends('layout.userLayout')

@section('body')
    Hi {{Session::get('user')[0]->first_name}} {{Session::get('user')[0]->last_name}}
@endsection