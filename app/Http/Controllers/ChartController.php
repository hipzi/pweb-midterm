<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function chart(){
        $seller_id = Auth::id();

        $month = Software::findOrFail($seller_id)->monthSalesRate($seller_id);
        $month_name = Software::findOrFail($seller_id)->monthSalesRateName($seller_id);
        $year = Software::findOrFail($seller_id)->yearSalesRate($seller_id);
        $year_name = Software::findOrFail($seller_id)->yearSalesRateName($seller_id);
        $mobile = Software::findOrFail($seller_id)->softwareTypeMobile($seller_id);
        $website = Software::findOrFail($seller_id)->softwareTypeWebsite($seller_id);
        $desktop = Software::findOrFail($seller_id)->softwareTypeDesktop($seller_id);
        $software = Software::findOrFail($seller_id)->chartSoftware($seller_id);
        $software_name = Software::findOrFail($seller_id)->chartSoftwareName($seller_id);

        return view('seller.chart', compact('month', 'month_name', 'year', 'year_name',
            'mobile', 'website', 'desktop', 'software', 'software_name'));
    }
}
