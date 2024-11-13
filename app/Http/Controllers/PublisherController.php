<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublisherModel;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller
{   
    //show publisher list
    public function list(){
        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('publisher-list', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to access publisher.');
        }

        $data['getRecord'] = PublisherModel::getRecord();
        return view('panel.publisher.list', $data);
    }

    //Publisher add
    public function add(){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('add-publisher', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to add publisher.');
        }

        return view('panel.publisher.add');
    }   
    
    // Insert Publisher
    public function insert(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|numeric|digits_between:10,15',
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
     
    //Permission 
    $permissionrole = PermissionRoleModel::getPermission('edit-publisher', Auth::user()->role_id);
    if(empty($permissionrole)){
    return redirect()->back()->with('error', 'You do not have permission to edit publisher.');
    }

        $data['getRecord'] = PublisherModel::getSingle($id);

        return view('panel.publisher.edit', $data);
    }

    public function update($id, Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|numeric|digits_between:10,15',
            'website' => 'nullable|url|max:255', // Optional but must be a valid URL if provided
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
        ]);
    
        // Get the existing record using the find method
        $save = PublisherModel::getSingle($id);
        if (!$save) {
            return redirect()->back()->with('error', 'Publisher not found');
        }
    
        // Update the publisher details
        $save->name = $request->name;
        $save->address = $request->address;
        $save->email = $request->email;
        $save->mobile = $request->mobile;
        $save->website = $request->website;
    
        // Handle file upload if the logo is present
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension(); // Generate unique filename
            $file->move(public_path('assets/upload/publisher'), $filename);
            $save->logo = $filename;
        }
    
        // Save the updated record
        if ($save->save()) {
            return redirect('panel/publisher')->with('success', 'Publisher Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'Failed to update Publisher');
        }
    }
    

    public function delete($id){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('delete-publisher', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to delete publisher.');
        }

        $data = PublisherModel::getSingle($id);
        $data->delete();

        return redirect('panel/publisher')->with('success', 'Publisher Successfully Deleted');
    }

    
}
