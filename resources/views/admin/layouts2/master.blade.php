<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> قالب مدیریتی </title>
    <link rel="shortcut icon" href="{{url('panel/assets/media/image/favicon.png')}}">
    <meta name="theme-color" content="#5867dd">
    <link rel="stylesheet" href="{{url('panel/vendors/bundle.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('panel/vendors/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{url('panel/vendors/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/vendors/vmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/plugins/sweet_alert/sweetalert2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/plugins/datepicker/kamadatepicker.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/plugins/colorpicker/css/bootstrap-colorpicker.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/plugins/dropzone/css/dropzone.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/plugins/persian_date_picker/persian-datepicker.min.css')}}"/>

    <link href="{{url('Design/plugins/bower_components/bootstrap-rtl-master/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">

    <link href="{{url('Design/plugins/bower_components/DataTables/datatables.css')}}" rel="stylesheet" />
    <link href="{{url('Design/css/style.css')}}" rel="stylesheet">
    <link href="{{url('Design/css/Site.css')}}" rel="stylesheet" />
    <script src='{{url('Design/plugins/bower_components/pdfmake.min.js')}}'></script>
    <script src='{{url('Design/plugins/bower_components/vfs_fonts.js')}}'></script>
    @livewireStyles

</head>
<body class="small-navigation">

@include('admin.layouts.navigation')
@include('admin.layouts.header',[ 'title' => $title ?? ''])
@yield('content')
@livewireScripts

<script src="{{url('panel/vendors/slick/slick.min.js')}}"></script>
<script src="{{url('panel/vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('panel/assets/js/app.js')}}"></script>
<script src="{{url('panel/plugins/sweet_alert/sweetalert2.all.min.js')}}"></script>
<script src="{{url('panel/vendors/select2/js/select2.min.js')}}"></script>
<script src="{{url('panel/plugins/colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{url('panel/plugins/colorpicker/js/colorpicker.js')}}"></script>
<script src="{{url('panel/plugins/datepicker/kamadatepicker.min.js')}}"></script>
<script src="{{url('panel/plugins/datepicker/kamadatepicker.holidays.js')}}"></script>
<script src="{{url('panel/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('panel/plugins/dropzone/js/dropzone.js')}}"></script>
<script src="{{url('panel/plugins/persian_date_picker/persian-date.min.js')}}"></script>
<script src="{{url('panel/plugins/persian_date_picker/persian-datepicker.min.js')}}"></script>
</body>
</html>

