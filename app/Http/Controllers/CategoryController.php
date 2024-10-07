<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CagegoryModel;


class CategoryController extends Controller
{
   
    //show publisher list
    public function list(){

        $data['getRecord'] = CagegoryModel::getRecord();
        return view('panel.categories.list', $data);
    }

    //Publisher add
    public function add(){

        return view('panel.categories.add');
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
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/publisher'), $filename);
            $save->logo = $filename;
        }

        $save->save();
    
        // Redirect with success message
        return redirect('panel/publisher')->with('success', 'Publisher Successfully Created');
    }

    public function details($id){

        $data['getRecord'] = PublisherModel::getSingle($id);

        return view('panel.publisher.details', $data);
    }

    public function edit($id){


        $data['getRecord'] = PublisherModel::getSingle($id);

        return view('panel.publisher.edit', $data);
    }

    public function update($id, Request $request){

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
            'mobile' => 'required|numeric|digits_between:10,15',
            'website' => 'nullable|url|max:255', // Optional but must be a valid URL if provided
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
        ]);

        $save = PublisherModel::getSingle($id);
        $save->name = $request->name;
        $save->address = $request->address;
        $save->email = $request->email;
        $save->mobile = $request->mobile;
        $save->website = $request->website;
    
        // Handle file upload if the logo is present
        if ($request->file('logo')) {

            $file = $request->file('logo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/publisher'), $filename);
            $save->logo = $filename;
        }

        $save->save();

        return redirect('panel/publisher')->with('success', 'Publisher Successfully Updated');
    }

    public function delete($id){

        $data = PublisherModel::getSingle($id);
        $data->delete();

        return redirect('panel/publisher')->with('success', 'Publisher Successfully Deleted');
    }


}
