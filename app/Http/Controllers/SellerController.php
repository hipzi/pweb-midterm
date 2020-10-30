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

    public function viewHistorySoftware() {
        return view('seller.history_software');
    }

    public function registerSoftware() {
        return view('seller.register_software');
    }

    public function registerSoftwareToDatabase(Request $request) {
        $software = new Software;

        $mytime = Carbon::now();
        $pictureFile = $request->file('picture');
        $image = base64_encode(file_get_contents($pictureFile->path()));
        
        $software->maker = Auth::id();
        $software->name = $request->name;
        $software->type_id = $request->type;
        $software->description = $request->description;
        $software->price = $request->price;
        $software->created_at = $mytime;
        $software->updated_at = $mytime;
        $software->picture = 'data:image/{'.$pictureFile->getClientOriginalExtension().'};base64,'.$image;

        $software->save();

        $file = $request->file('file');
        Storage::disk('public')->put($software->id.'/'.$file->getClientOriginalName(), File::get($file));

        return redirect()->route('software.register')->with('status', 'Software Created!');
    }

    public function editSoftware($id){
        $software = Software::find($id);
        $data = [
            'software'=>$software,
        ];
        return view('seller.edit_software')->with($data);
    }

    public function editSoftwareToDatabase(Request $request, $id){
        $software = Software::find($id);

        $mytime = Carbon::now();
        
        $software->maker = Auth::id();
        $software->name = $request->name;
        $software->type_id = $request->type;
        $software->description = $request->description;
        $software->price = $request->price;
        
        $software->updated_at = $mytime;

        if($request->hasFile('picture')){
            $pictureFile = $request->file('picture');
            $image = base64_encode(file_get_contents($pictureFile->path()));
            $software->picture = 'data:image/{'.$pictureFile->getClientOriginalExtension().'};base64,'.$image;
        }

        $software->save();

        if($request->hasFile('file')){

            Storage::disk('public')->delete($software->id);
            $file = $request->file('file');
            Storage::disk('public')->put($software->id.'/'.$file->getClientOriginalName(), File::get($file));

        }

        return redirect()->route('software.edit', ['id'=>$id])->with('status', 'Software Edited!');
    }

}
