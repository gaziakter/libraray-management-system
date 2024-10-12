<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthorModel;

class AuthorControlller extends Controller
{
    // list
    public function list(){
        $data['getRecord'] = AuthorModel::getRecord();
        return view('panel.author.list', $data);
    }

    //Author add
    public function add(){
        $data['getCategory'] = AuthorModel::getRecord();
        return view('panel.author.add', $data);
    } 

        // Insert Write
        public function insert(Request $request)
        {
       
            // Validate the request data
            $request->validate([
                'name' => 'required|string|unique:authors,name', // Ensure the category name is unique
                'address' => 'nullable|string|max:500',
                'email' => 'nullable|email|max:255|unique:authors,email',
                'mobile' => 'nullable|numeric|digits_between:10,15|unique:authors,mobile',
                'website' => 'nullable|url|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
            ]);
           
            // Create a new instance of the CategoryModel for insertion
            $authorData = new AuthorModel();
        
            // Set the category details
            $authorData->name = $request->name;
            $authorData->address = $request->address;
            $authorData->mobile = $request->mobile;
            $authorData->email = $request->email;
            $authorData->website = $request->website;
            $authorData->slug = strtolower(str_replace(' ', '-', $request->name));

        // Handle file upload if the logo is present
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/author'), $filename);
            $authorData->photo = $filename;
        }
    
            // Save the new category record
            if ($authorData->save()) {
                return redirect('panel/author')->with('success', 'Author Successfully Created');
            } else {
                return redirect()->back()->with('error', 'Failed to add Author');
            }
        }

        public function details($id){

            $data['getRecord'] = AuthorModel::getSingle($id);
    
            return view('panel.author.details', $data);
        }

        public function edit($id){

            $data['getRecord'] = AuthorModel::getSingle($id);
    
            return view('panel.author.edit', $data);
        }

        public function update($id, Request $request)
        {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|unique:authors,name', // Ensure the category name is unique
                'address' => 'nullable|string|max:500',
                'email' => 'nullable|email|max:255|unique:authors,email',
                'mobile' => 'nullable|numeric|digits_between:10,15|unique:authors,mobile',
                'website' => 'nullable|url|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
            ]);
        
            // Get the existing record using the find method
            $authorData = AuthorModel::getSingle($id);
            if (!$authorData) {
                return redirect()->back()->with('error', 'Author not found');
            }
        
            // Set the category details
            $authorData->name = $request->name;
            $authorData->address = $request->address;
            $authorData->mobile = $request->mobile;
            $authorData->email = $request->email;
            $authorData->website = $request->website;
            $authorData->slug = strtolower(str_replace(' ', '-', $request->name));
        
        // Handle file upload if the logo is present
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/author'), $filename);
            $authorData->photo = $filename;
        }
        
            // Save the updated record
            if ($authorData->save()) {
                return redirect('panel/author')->with('success', 'Author Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Failed to update Author');
            }
        }

        public function delete($id){
            $data = AuthorModel::getSingle($id);
            $data->delete();
    
            return redirect('panel/author')->with('success', 'Author Successfully Deleted');
        }
}