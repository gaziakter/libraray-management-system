<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   
    //show publisher list
    public function list(){
        $data['getRecord'] = SubCategoryModel::getRecord();
        return view('panel.subcategories.list', $data);
    }
}
