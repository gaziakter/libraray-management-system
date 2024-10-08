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
    
    public function insert(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|unique:categories,category_name', // Ensure the category name is unique
            'description' => 'required|string|max:255'
        ]);
    
        // Create a new instance of the CategoryModel for insertion
        $category = new CagegoryModel();
    
        // Set the category details
        $category->category_name = $request->category_name;
        $category->description = $request->description;
    
        // Generate slug from category name
        $category->slug = strtolower(str_replace(' ', '-', $request->category_name));
    
        // Save the new category record
        if ($category->save()) {
            return redirect('panel/categories')->with('success', 'Category Successfully Added');
        } else {
            return redirect()->back()->with('error', 'Failed to add Category');
        }
    }
    

    public function edit($id){


        $data['getRecord'] = CagegoryModel::getSingle($id);

        return view('panel.categories.edit', $data);
    }


    public function update($id, Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|unique:categories,category_name,' . $id, // Unique, except for the current category
            'description' => 'required|string|max:255'
        ]);
    
        // Get the existing record using the find method
        $category = CagegoryModel::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
    
        // Update the category details
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->slug = strtolower(str_replace(' ', '-', $request->category_name));
    
        // Save the updated record
        if ($category->save()) {
            return redirect('panel/categories')->with('success', 'Category Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'Failed to update Category');
        }
    }
    

 

    public function delete($id){

        $data = CagegoryModel::getSingle($id);
        $data->delete();

        return redirect('panel/categories')->with('success', 'Category Successfully Deleted');
    }


}
