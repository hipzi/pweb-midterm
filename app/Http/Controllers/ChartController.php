<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function chart(){
        $seller_id = Auth::id();

        $month = Software::monthSalesRate($seller_id);
        $month_name = Software::monthSalesRateName($seller_id);
        $year = Software::yearSalesRate($seller_id);
        $year_name = Software::yearSalesRateName($seller_id);
        $mobile = Software::softwareTypeMobile($seller_id);
        $website = Software::softwareTypeWebsite($seller_id);
        $desktop = Software::softwareTypeDesktop($seller_id);
        $software = Software::chartSoftware($seller_id);
        $software_name = Software::chartSoftwareName($seller_id);

        return view('seller.chart', compact('month', 'month_name', 'year', 'year_name',
            'mobile', 'website', 'desktop', 'software', 'software_name'));
    }
}
