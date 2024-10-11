<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\WriterModel;
use App\Models\PublisherModel;
use App\Models\CagegoryModel;
use App\Models\SubCategoryModel;

class BookController extends Controller
{
    //show book list
    public function list(){
        $data['getRecord'] = BookModel::getRecord();
        return view('panel.book.list',  $data);
    }

        // add 
        public function add(){
            $data['getWriter'] = WriterModel::getRecord();
            $data['getPublisher'] = PublisherModel::getRecord();
            $data['getCagegory'] = CagegoryModel::getRecord();
            $data['getSubCategory'] = SubCategoryModel::getRecord();
            return view('panel.book.add', $data);
        }
        
        public function getSubcategories($category_id) {
            
            // Fetch subcategories based on category ID
            $subcategories = SubCategoryModel::where('category_id', $category_id)->get();
        
            // Return subcategories as JSON
            return response()->json($subcategories);
        }
}
