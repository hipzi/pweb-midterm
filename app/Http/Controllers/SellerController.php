<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SoftwareBuyer;
use DataTables;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index(){
        return view('layouts.seller');
    }

    public function historySoftware(){
        $data = SoftwareBuyer::historySoftware()->newQuery();
        return DataTables::eloquent($data)->toJson();
    }

    function viewHistorySoftware()
    {
        return view('seller.history_software');
    }
}
