<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SoftwareBuyer;
use App\Models\Software;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index() {
        return view('layouts.seller');
    }

    public function historySoftware() {
        $data = SoftwareBuyer::historySoftware()->newQuery();
        return DataTables::eloquent($data)->toJson();
    }

    function viewHistorySoftware() {
        return view('seller.history_software');
    }

    function registerSoftware() {
        return view('seller.register_software');
    }

    function registerSoftwareToDatabase(Request $request) {
        $software = new Software;

        $mytime = Carbon::now();
        $image = base64_encode(file_get_contents($request->file('picture')->path()));
        
        $software->maker = Auth::id();
        $software->name = $request->name;
        $software->type_id = $request->type;
        $software->description = $request->description;
        $software->price = $request->price;
        $software->created_at = $mytime;
        $software->updated_at = $mytime;
        $software->picture = $image;

        $software->save();

        $file = $request->file('file');
        $fileName = 
        Storage::disk('public')->put($software->id.'/'.$file->getClientOriginalName(), File::get($file));

        return view('layouts.seller');
    }

}
