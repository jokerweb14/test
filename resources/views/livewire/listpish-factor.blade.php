<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-8">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>

    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">نام محصول</th>
            <th class="text-center align-middle text-primary">قیمت 1</th>
            <th class="text-center align-middle text-primary">قیمت 2</th>
            <th class="text-center align-middle text-primary">قیمت 3</th>
            <th class="text-center align-middle text-primary">تعداد</th>
            <th class="text-center align-middle text-primary">افزودن</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as  $product)
            <tr>
                <td class="text-center align-middle">{{$product->naka}}</td>
                <td class="text-center align-middle">{{number_format($product->forosh1)}}</td>
                <td class="text-center align-middle">{{number_format($product->forosh2)}}</td>
                <td class="text-center align-middle">{{number_format($product->forosh3)}}</td>
                <td class="text-center align-middle">{{$product->mojkavah*$product->mohvah+$product->mojkajoz}}</td>
                <td class="text-center align-middle">
                    <a wire:click="add({{$product->coka}},{{$product->forosh1}},{{$product->naka}})"
                       class="btn btn-outline-info">
                        افزودن
                    </a>
                </td>
            </tr>

        @endforeach


    </table>

    <div class="col-sm-2">
        <a href="{{route('pishfactor')}}" class="btn btn-success btn-uppercase">
            تکمیل پیش فاکتور
        </a>
    </div>
    {{--    <div style="margin: 40px !important;"--}}
    {{--         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">--}}
    {{--        {{$products->appends(Request::except('page'))->links()}}--}}
    {{--    </div>--}}
</div>


