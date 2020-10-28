<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\SoftwareType;
use App\Models\SoftwareBuyer;
use App\Models\Status;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function softwareWithType($type = 0) {
        if($type)
            $softwares = Software::where('type_id', $type)->get();
        else $softwares = Software::all();

        $type = ($type)? SoftwareType::find($type)->type : "Available";

        $data = [
            'softwares' => $softwares,
            'type' => $type
        ];

        return view('customer.buy_software')->with($data);
    }

    public function viewSoftwareDetail($id) {
        $software = Software::find($id);
        
        if(!$software) return redirect()->route('home');

        $data = [
            'software' => $software,
        ];

        return view('customer.software_detail')->with($data);
    }

    public function listSoftware(){
        $user_id = Auth::id();
        $data = SoftwareBuyer::findOrFail($user_id)->listSoftware($user_id)->newQuery();
        // dd($data);
        return DataTables::eloquent($data)->toJson();
    }

    function viewListSoftware()
    {
        return view('customer.list_software');
    }
}
