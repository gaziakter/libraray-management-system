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
            'sub_category_name' => 'required|string|unique:subcategories,sub_category_name', // Ensure the category name is unique
            'category_name' => 'required|string'
        ]);
    
        $category_id = $request->category_name;
        $category_name = CagegoryModel::where('id', $category_id)->value('category_name');


        // Create a new instance of the CategoryModel for insertion
        $subCategory = new SubCategoryModel();
    
        // Set the category details
        $subCategory->sub_category_name = $request->sub_category_name;
        $subCategory->category_id = $category_id;
        $subCategory->category_name = $category_name;
        $subCategory->slug = strtolower(str_replace('', '-', $request->sub_category_name));

        // Save the new category record
        if ($subCategory->save()) {
            return redirect('panel/subcategories')->with('success', 'Sub Category Successfully Created');
        } else {
            return redirect()->back()->with('error', 'Failed to add Category');
        }
    }

    public function edit($id){
        
        $data['getCategory'] = CagegoryModel::getRecord($id);
        $data['getRecord'] = SubCategoryModel::getSingle($id);

        return view('panel.subcategories.edit', $data);
    }


    public function update($id, Request $request)
    {
        // Validate the request data
        $request->validate([
            'sub_category_name' => 'required|string|unique:subcategories,sub_category_name', // Unique, except for the current category
            'category_name' => 'required|string'
        ]);
    
        // Get the existing record using the find method
        $subCategory = SubCategoryModel::getSingle($id);
        if (!$subCategory) {
            return redirect()->back()->with('error', 'Sub Category not found');
        }
    
        $category_id = $request->category_name;
        $category_name = CagegoryModel::where('id', $category_id)->value('category_name');


        // Set the category details
        $subCategory->sub_category_name = $request->sub_category_name;
        $subCategory->category_id = $category_id;
        $subCategory->category_name = $category_name;
        $subCategory->slug = strtolower(str_replace('', '-', $request->sub_category_name));
    
        // Save the updated record
        if ($subCategory->save()) {
            return redirect('panel/subcategories')->with('success', 'Sub Category Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'Failed to update Sub Category');
        }
    }
}
