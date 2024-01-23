@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-primary font-weight-bold primary-font">تعداد
                                    کاربران</h6>
                            </div>
                            <div>
                                <img class="peity" height="60" width="60" src="{{url('frontend/img/user.svg')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-success font-weight-bold primary-font">تعداد فروش</h6>
                            </div>
                            <div>
                                <img class="peity" height="60" width="60" src="{{url('frontend/img/shopping.svg')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-warning font-weight-bold primary-font">پیام ها</h6>
                            </div>
                            <div>
                                <img class="peity" height="60" width="60" src="{{url('frontend/img/mail.svg')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-info font-weight-bold primary-font">تعداد
                                    محصولات </h6>
                            </div>
                            <div>
                                <img class="peity" height="60" width="60" src="{{url('frontend/img/store.svg')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
