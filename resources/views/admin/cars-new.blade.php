@extends('layout.adminLayout')

@section('body')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title">Cars Management</h3>
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
                                    Create New Cars
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="new-unit-form" class="m-form m-form--label-align-right" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">*User:</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-input m-input--square" name="user-id" required>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}({{$user->email}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">*Make:</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-input m-input--square" name="make-id" required>
                                        @foreach($makes as $make)
                                            <option value="{{$make->id}}">{{$make->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">*Type:</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" name="type" required>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">*Color:</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" name="color" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection
