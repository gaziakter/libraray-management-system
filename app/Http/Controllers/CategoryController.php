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
        $request->validate([
            'category_name' => 'required||string|unique:categories',
            'description' => 'required|string|max:255'
        ]);
    
        // If validation passes, process the data
        $save = new CagegoryModel;
        $save->category_name = $request->category_name;
        $save->description = $request->description;
        $save->slug = strtolower(str_replace('', '-', $request->name));
        $save->save();
    
        // Redirect with success message
        return redirect('panel/categories')->with('success', 'Category Successfully Created');
    }

    public function edit($id){


        $data['getRecord'] = CagegoryModel::getSingle($id);

        return view('panel.categories.edit', $data);
    }

    public function update($id, Request $request){

        $request->validate([
            'category_name' => 'required||string|unique:categories',
            'description' => 'required|string|max:255'
        ]);

        $save = CagegoryModel::getSingle($id);
        $save->category_name = $request->category_name;
        $save->description = $request->description;
        $save->slug = strtolower(str_replace('', '-', $request->category_name));
        $save->save();

        return redirect('panel/categories')->with('success', 'Category Successfully Updated');
    }

    public function delete($id){

        $data = CagegoryModel::getSingle($id);
        $data->delete();

        return redirect('panel/categories')->with('success', 'Category Successfully Deleted');
    }


}
