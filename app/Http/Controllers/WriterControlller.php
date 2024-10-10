<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WriterModel;

class WriterControlller extends Controller
{
        // list
    public function list(){
        $data['getRecord'] = WriterModel::getRecord();
        return view('panel.writer.list', $data);
    }

    //Writer add
    public function add(){
        $data['getCategory'] = WriterModel::getRecord();
        return view('panel.writer.add', $data);
    } 

        // Insert Write
        public function insert(Request $request)
        {
       
            // Validate the request data
            $request->validate([
                'name' => 'required|string|unique:writers,name', // Ensure the category name is unique
                'address' => 'nullable|string|max:500',
                'email' => 'nullable|email|max:255|unique:writers,email',
                'mobile' => 'nullable|numeric|digits_between:10,15|unique:writers,mobile',
                'website' => 'nullable|url|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
            ]);
           
            // Create a new instance of the CategoryModel for insertion
            $writerData = new WriterModel();
        
            // Set the category details
            $writerData->name = $request->name;
            $writerData->address = $request->address;
            $writerData->mobile = $request->mobile;
            $writerData->email = $request->email;
            $writerData->website = $request->website;
            $writerData->slug = strtolower(str_replace(' ', '-', $request->name));

        // Handle file upload if the logo is present
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/writer'), $filename);
            $writerData->photo = $filename;
        }
    
            // Save the new category record
            if ($writerData->save()) {
                return redirect('panel/writer')->with('success', 'Writer Successfully Created');
            } else {
                return redirect()->back()->with('error', 'Failed to add Writer');
            }
        }

        public function details($id){

            $data['getRecord'] = WriterModel::getSingle($id);
    
            return view('panel.writer.details', $data);
        }

        public function edit($id){

            $data['getRecord'] = WriterModel::getSingle($id);
    
            return view('panel.writer.edit', $data);
        }

        public function update($id, Request $request)
        {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|unique:writers,name', // Ensure the category name is unique
                'address' => 'nullable|string|max:500',
                'email' => 'nullable|email|max:255|unique:writers,email',
                'mobile' => 'nullable|numeric|digits_between:10,15|unique:writers,mobile',
                'website' => 'nullable|url|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
            ]);
        
            // Get the existing record using the find method
            $writerData = WriterModel::getSingle($id);
            if (!$writerData) {
                return redirect()->back()->with('error', 'Writer not found');
            }
        
            // Set the category details
            $writerData->name = $request->name;
            $writerData->address = $request->address;
            $writerData->mobile = $request->mobile;
            $writerData->email = $request->email;
            $writerData->website = $request->website;
            $writerData->slug = strtolower(str_replace(' ', '-', $request->name));
        
        // Handle file upload if the logo is present
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/writer'), $filename);
            $writerData->photo = $filename;
        }
        
            // Save the updated record
            if ($writerData->save()) {
                return redirect('panel/writer')->with('success', 'Writer Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Failed to update Publisher');
            }
        }

        public function delete($id){
            $data = WriterModel::getSingle($id);
            $data->delete();
    
            return redirect('panel/writer')->with('success', 'Writer Successfully Deleted');
        }
}
