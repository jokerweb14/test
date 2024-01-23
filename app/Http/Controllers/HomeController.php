<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        $db=DB::connection('sqlsrv')->table('moshtari')->get();
//        dd($db);
//        $db=DB::connection('sqlsrv')->insert('INSERT INTO table_name (column_1, column_2, column_3)
//VALUES ()');
//        dd($db);
        return view('admin.index');
    }

    public function pishfactor()
    {
        $moshtari=DB::connection('sqlsrv')->table('moshtari')->get();
        $products=DB::connection('sqlsrv')->table('KalaPrice')->get();
        $vis=DB::connection('sqlsrv')->table('visitors')->get();
        return view('admin.products.create',compact('moshtari','products','vis'));
    }

    public function listpishfactor()
    {
        return view('admin.products.list');
    }
    public function storepishfactor()
    {

    }
}
