<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\SoftwareType;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function softwareWithType($type) {
        $softwares = Software::where('type_id', $type)->get();
        $type = SoftwareType::find($type)->type;

        $data = [
            'softwares' => $softwares,
            'type' => $type
        ];

        return view('customer.buy_software')->with($data);
    }
}
