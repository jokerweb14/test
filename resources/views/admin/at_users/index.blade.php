
@extends('admin.layouts2.master')

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست قیمت برگ سبز</title>
    <link rel="icon" href="{{url('Design/images/logo.png')}}">
    <link href="{{url('Design/plugins/bower_components/bootstrap-rtl-master/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">

    <link href="{{url('Design/plugins/bower_components/DataTables/datatables.css')}}" rel="stylesheet" />
    <link href="{{url('Design/css/style.css')}}" rel="stylesheet">
    <link href="{{url('Design/css/Site.css')}}" rel="stylesheet" />
    <script src='{{url('Design/plugins/bower_components/pdfmake.min.js')}}'></script>
    <script src='{{url('Design/plugins/bower_components/vfs_fonts.js')}}'></script>

{{--    <style>--}}
{{--        .loading {--}}
{{--            position: fixed;--}}
{{--            top: 0;--}}
{{--            right: 0;--}}
{{--            bottom: 0;--}}
{{--            left: 0;--}}
{{--            background: #fff;--}}
{{--        }--}}

{{--        .loader {--}}
{{--            display: none;--}}
{{--            left: 50%;--}}
{{--            margin-left: -4em;--}}
{{--            font-size: 10px;--}}
{{--            border: .8em solid rgba(218, 219, 223, 1);--}}
{{--            border-left: .8em solid rgba(58, 166, 165, 1);--}}
{{--            animation: spin 1.1s infinite linear;--}}


{{--        }--}}

{{--        .loader,--}}
{{--        .loader:after {--}}
{{--            border-radius: 50%;--}}
{{--            width: 8em;--}}
{{--            height: 8em;--}}
{{--            display: block;--}}
{{--            position: absolute;--}}
{{--            top: 50%;--}}
{{--            margin-top: -4.05em;--}}
{{--        }--}}

{{--        @keyframes spin {--}}
{{--            0% {--}}
{{--                transform: rotate(360deg);--}}
{{--            }--}}

{{--            100% {--}}
{{--                transform: rotate(0deg);--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}


</head>

<body>
    <div class="container-fluid">
        <div class="loading">
            <div class="loader"></div>
        </div>
        <h1 class="text-center text-success">لیست قیمت تجهیزات پزشکی برگ سبز</h1>
        <div class="table-responsive">
            <table class="table table-Page table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">کد</th>
                        <th scope="col">نام محصول</th>
                        <th scope="col">موجودی</th>
                        <th scope="col">فروش 1 (ریال)</th>
                        <th scope="col">فروش 2</th>
                        <th scope="col">فروش 3</th>
                        <th scope="col"> قیمت مصرف کننده</th>
                        <th scope="col">دسته بندي</th>
                    </tr>
                </thead>

            </table>
        </div>
        <script src="{{url('Design/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('Design/plugins/bower_components/bootstrap-rtl-master/dist/js/bootstrap-rtl.min.js')}}"></script>
        <script src="{{url('Design/plugins/bower_components/DataTables/datatables.js')}}"></script>

        <script>
            $(document).ready(function () {

                $('.loading').show();//Load button clicked show spinner


                $.extend($.fn.dataTable.defaults, {
                    "order": [],
                    "language": {
                        "lengthMenu": "  در هر صفحه_MENU_نمایش  ",
                        "zeroRecords": "موردی پیدا نشد",
                        "info": " _TOTAL_ رکورد",
                        "infoEmpty": "رکوردی وجود ندارد",
                        "infoFiltered": "(فیلتر از _MAX_ کل رکورد )",
                        "loadingRecords": "در حال بارگذاری...",
                        "processing": "در حال پردازش ...",
                        "search": "جستجو:",
                        "emptyTable": "داده ای وجود ندارد",

                        "paginate": { "first": "اولین", "last": "آخرین", "next": "بعدی", "previous": "قبلی" },
                    },

                });
                var url = "http://192.168.1.25:5151/api/KalaPrices";
                /*  var url = "http://79.127.2.50:5151/api/KalaPrices",*/



                var table1 = $('.table-Page').DataTable(
                    {

                        dom: 'Bfrtip'
                        , buttons: [

                            {
                                extend: 'print',
                                autoPrint: false,
                                text: 'لیست قیمت',
                                messageTop: "لیست  قیمت تجهیزات پزشکی برگ سبز",
                                title: '',
                                exportOptions: {
                                    columns: [0, 1, 3, 4, 5, 7]
                                }
                            },

                        ],

                        "pageLength": 50,
                        ajax: {
                            url: url,
                            cache: true,
                            timeout: 40000,
                            dataSrc: function (json) {
                                localStorage.setItem('dataApi', JSON.stringify(json.data));
                                return json.data;
                            },
                            complete: function () {
                                $('.loading').hide();//Request is complete so hide spinner
                            },

                            error: function (xhr, error, code) {

                                doOfline();

                            },

                        },

                        columns: [
                            { data: 'Id' },
                            { data: 'Name' },
                            { data: 'Value' },
                            {
                                data: 'Price1',
                                render: $.fn.dataTable.render.number(',', '.', 0, '')
                            },
                            {
                                data: 'Price2',
                                render: $.fn.dataTable.render.number(',', '.', 0, '')
                            },
                            {
                                data: 'Price3',
                                render: $.fn.dataTable.render.number(',', '.', 0, '')
                            },
                            {
                                data: 'PriceCus',
                                render: $.fn.dataTable.render.number(',', '.', 0, '')
                            },

                            { data: 'CategoryName' },


                        ]
                    });


                function doOfline() {
                    if (localStorage.getItem('dataApi') !== null) {
                        var dataApi = JSON.parse(localStorage.getItem('dataApi'));
                        table1.clear().draw();
                        table1.rows.add(dataApi).draw();
                        alert(" سرور قطع شده است ، قادر به بروزرسانی اطلاعات نیستیم");
                    }
                    else {
                        alert("سرور قطع است و نسخه آفلاین اطلاعات وجود ندارد")
                    }
                }
                function toEnglishNumber(strNum) {
                    var pn = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "ی", "ک"];
                    var en = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "ي", "ك"];

                    var cache = strNum;

                    for (var i = 0; i < 12; i++) {
                        var regex_fa = new RegExp(pn[i], 'g');
                        cache = cache.replace(regex_fa, en[i]);
                    }

                    return cache;
                }
                $(".dataTables_filter input").bind("change keyup input", function (e) {

                    this.value = toEnglishNumber(this.value);
                    table1.search(this.value).draw();

                });
            });


        </script>
</body>

</html>
