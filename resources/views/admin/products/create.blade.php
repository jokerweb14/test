@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد پيش فاكتور</h6>
                    <form method="POST" action="{{route('storepishfactor')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نام مشتري</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نام مشتري</label>
                            <div class="col-sm-10">
                                <select name="moshtari" class="form-select">
                                    @foreach($moshtari as $key )
                                        <option value="{{$key->code}}"> {{$key->MONAME}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">محصول</label>
                            <div class="col-sm-10">
                                <select name="brand_id" class="form-select">
                                    @foreach($products as $key)
                                        <option value="{{$key->coka}}"> {{$key->naka}}={{number_format($key->forosh1)}}
                                            تعداد={{$key->mojkavah*$key->mohvah+$key->mojkajoz}} </option>
                                        <option value="{{$key->coka}}"> {{$key->naka}}={{number_format($key->forosh2)}}
                                            تعداد={{$key->mojkavah*$key->mohvah+$key->mojkajoz}} </option>
                                        <option value="{{$key->coka}}"> {{$key->naka}}={{number_format($key->forosh3)}}
                                            تعداد={{$key->mojkavah*$key->mohvah+$key->mojkajoz}} </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">انتخاب ويزيتور:</label>
                            <div class="col-sm-10">
                                <select name="moshtari" class="form-select">
                                    @foreach($vis as $key )
                                        <option value="{{$key->vis_rdf}}">{{$key->vis_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">توضیحات </label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control text-left" id="editor" dir="rtl"
                                          name="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <livewire:pish-factor/>

                        <div class="form-group row">
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')

    <script>
        $('select').select2({
            dir: "rtl",
            dropdownAutoWidth: true,
            $dropdownParent: $('#parent')
        })
        $('.form-select').select2();
    </script>
@endsection
