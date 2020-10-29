<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\SoftwareBuyer;
use App\Models\SoftwareType;
use App\Models\Status;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        return DataTables::eloquent($data)->toJson();
    }

    function viewListSoftware()
    {
        return view('customer.list_software');
    }
    
    public function checkoutSoftware($id) {
        $software_buyer = SoftwareBuyer::firstWhere([
            ['software_id', $id],
            ['user_id', Auth::id()]
        ]);

        if (!$software_buyer) {
            $software_buyer = new SoftwareBuyer;
            $software_buyer->user_id = Auth::id();
            $software_buyer->software_id = $id;
            $software_buyer->status_id = 1;
            $software_buyer->review = "";
            $software_buyer->rating = 0;
            $software_buyer->proof_of_payment = "";
            $software_buyer->save();
        } else if($software_buyer->status()->id == 2){
            return redirect()->route('software-detail', ['id' => $id]);
        }

        $data = [
            "software_buyer" => $software_buyer,
        ];

        return view('customer.checkout_software')->with($data);
    }

    public function checkout(Request $request, $id) {
        $software = Software::find($id);
        $software_buyer = SoftwareBuyer::firstWhere([
            ['software_id', $id],
            ['user_id', Auth::id()]
        ]);

        if($software->price > 0) {
            if(!$request->hasFile('proof_of_payment')) return redirect()->route('software-checkout', ['id' => $id])->with('error', 'Need to Upload Proof of Payment!');;
            $software_buyer->proof_of_payment = base64_encode(file_get_contents($request->file('proof_of_payment')));
        }

        $software_buyer->status_id = 2;
        $software_buyer->save();

        return redirect()->route('software-detail', ['id' => $id]);
    }

    public function download(Request $request, $id){
        $files = Storage::disk('public')->files('/'.$id);
        foreach ($files as $filename) {
            return Storage::disk('public')->download($filename);
        }
    }

    public function rate(Request $request, $id){

    }
}
