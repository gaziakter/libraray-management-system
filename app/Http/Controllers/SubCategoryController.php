<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryModel;
use App\Models\CagegoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   
    //show Sub Category list
    public function list(){
        $data['getRecord'] = SubCategoryModel::getRecord();
        return view('panel.subcategories.list', $data);
    }

    //Sub Category add
    public function add(){

        $data['getCategory'] = CagegoryModel::getRecord();
        return view('panel.subcategories.add', $data);
    } 
    
    // Insert sub category
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
}
