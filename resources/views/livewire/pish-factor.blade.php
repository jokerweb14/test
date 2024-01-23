<div class="table overflow-auto" tabindex="8">

    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">نام محصول</th>
            <th class="text-center align-middle text-primary">تعداد</th>
            <th class="text-center align-middle text-primary">قیمت</th>
            <th class="text-center align-middle text-primary">حذف</th>
        </tr>
        </thead>
        <tbody>
        @if(session('cart'))

            @foreach(session('cart') as $product=>$cart)
                <tr>
                    <td class="text-center align-middle">
                        <input name="naka" value="{{$cart['id']}}" readonly/>
                    </td>
                    <td class="text-center align-middle">

                        <div class="product-count">
                            <div class="btn btn-info count-inc">
                                <i wire:click="update_count({{$cart['id']}},{{$cart['count']}})" class="fa fa-plus"></i>
                            </div>
                            <input type="number"
                                   value="{{$cart['count']}}"
                                   data-max="">
                            <div class="btn btn-info count-dec">
                                <i wire:click="update_count_minus({{$cart['id']}},{{$cart['count']}})"
                                   class="fa fa-minus"></i>
                            </div>
                        </div>
                    </td>

                    <td class="text-center align-middle">
                        <div class="col-sm-10">
                            <select name="category_id" class="form-select">

                                <option value="1"> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>

                            </select>
                        </div>

                    </td>
                    <td class="text-center align-middle">
                        <a class="btn btn-outline-danger"
                           wire:click="deleteCart({{$cart['id']}})">
                            حذف
                        </a>
                    </td>
                </tr>
        @endforeach

    </table>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">جمع کل</label>
        <div class="col-sm-10">
            <input type="text" class=" text-left" dir="rtl" name="title" value="{{number_format($total_price)}}"
                   readonly>
        </div>
    </div>
</div>
@endif


