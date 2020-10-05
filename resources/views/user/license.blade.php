@extends('layout.userLayout')

@section('body')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title">Drive License</h3>
            </div>
        </div>
    </div>
    <div class="m-content">
        @php
            $license = $user->license();
        @endphp
        @if(isset($error))
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
        @endif
        @if($license)
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Create License Portlet-->
                    <div class="m-portlet">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                         <span class="m-portlet__head-icon m--hide">
                         <i class="la la-gear"></i>
                         </span>
                                    <h3 class="m-portlet__head-text">
                                        Current License
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="m-form m-form--label-align-right">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="m-portlet__body">

                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Number:</label>
                                        <div class="col-lg-6">
                                            <div class="form-control">{{$license->number}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Expired At:</label>
                                        <div class="col-lg-6">
                                            <div class="form-control">{{$license->expired_at}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Created At:</label>
                                        <div class="col-lg-6">
                                            <div class="form-control">{{$license->created_at}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Updated At:</label>
                                        <div class="col-lg-6">
                                            <div class="form-control">{{$license->updated_at}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Create License Portlet-->
                </div>
            </div>
        @endif
        @if(!$user->checkLicenseValidate())
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Create License Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                         <span class="m-portlet__head-icon m--hide">
                         <i class="la la-gear"></i>
                         </span>
                                <h3 class="m-portlet__head-text">
                                    Update License
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form id="new-unit-form" class="m-form m-form--label-align-right" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="m-portlet__body">

                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">*Number:</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" name="number" type="number" min="100000000" max="999999999" required>
                                    </div>
                                </div>
                            </div>     <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">*Expired At:</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="expired-at"  id="expired-at" readonly />
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
                <!--end::Create License Portlet-->
            </div>
        </div>
        @endif
    </div>

@endsection

@section('script')
    <script src="{{asset('resources/theme/assets/demo/default/base/scripts.bundle.js')}}"></script>
    <script>
        $('#expired-at').datepicker({
            format: 'yyyy-mm-dd',
        });
    </script>
@endsection