<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
   
    //show publisher list
    public function list(){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('category-list', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to access category.');
        }

        $data['getRecord'] = CategoryModel::getRecord();
        return view('panel.categories.list', $data);
    }

    //Publisher add
    public function add(){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('add-category', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to add category.');
        }

        return view('panel.categories.add');
    }   
    
    public function insert(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|unique:categories,category_name', // Ensure the category name is unique
            'description' => 'nullable|string|max:255'
        ]);
    
        // Create a new instance of the CategoryModel for insertion
        $category = new CategoryModel();
    
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

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('edit-category', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to edit category.');
        }

        $data['getRecord'] = CategoryModel::getSingle($id);

        return view('panel.categories.edit', $data);
    }


    public function update($id, Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|unique:categories,category_name,' . $id, // Unique, except for the current category
            'description' => 'nullable|string|max:255'
        ]);
    
        // Get the existing record using the find method
        $category = CategoryModel::getSingle($id);
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

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('delete-category', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to delete category.');
        }

        $data = CategoryModel::getSingle($id);
        $data->delete();

        return redirect('panel/categories')->with('success', 'Category Successfully Deleted');
    }


}
