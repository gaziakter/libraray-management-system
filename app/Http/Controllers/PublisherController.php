<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublisherModel;
use Image;

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
    public function insert(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
            'mobile' => 'required|numeric|digits_between:10,15',
            'website' => 'nullable|url|max:255', // Optional but must be a valid URL if provided
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
        ]);
    
        // If validation passes, process the data
        $save = new PublisherModel;
        $save->name = $request->name;
        $save->address = $request->address;
        $save->email = $request->email;
        $save->mobile = $request->mobile;
        $save->website = $request->website;
    
        // Handle file upload if the logo is present
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/upload/publisher'), $filename);
            $save->logo = $filename;
        }
    
        // Save the publisher data
        $save->save();
    
        // Redirect with success message
        return redirect('panel/publisher')->with('success', 'Publisher successfully created');
    }

    public function details($id){

        $data['getRecord'] = PublisherModel::getSingle($id);

        return view('panel.publisher.details', $data);
    }
    
}
