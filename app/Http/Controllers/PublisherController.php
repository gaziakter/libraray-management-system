<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublisherModel;

class PublisherController extends Controller
{   
    //show publisher list
    public function list(){

        $data['getRecord'] = PublisherModel::getRecord();
        return view('panel.publisher.list', $data);
    }

    //Publisher add
    public function add(){

        return view('panel.publisher.add');
    }   
    
    // Insert Publisher
    public function insert(Request $request){

        $save = new PublisherModel;
        $save->name = $request->name;
        $save->address = $request->address;
        $save->email = $request->email;
        $save->mobile = $request->mobile;
        $save->website = $request->name;

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/upload/publisher'),$filename);
            $save['logo'] = $filename;
         }

        $save->save();

        return redirect('panel/publisher')->with('success', 'Publisher successfully Created');
    }
}
