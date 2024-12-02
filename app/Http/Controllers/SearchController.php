<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\AuthorModel;
use App\Models\PublisherModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function search(){

       // Fetch data from the database
       $categories = CategoryModel::all();
       $subCategories = SubCategoryModel::all();
       $authors = AuthorModel::all();
       $publishers = PublisherModel::all();

    return view('panel.search.form', compact('categories', 'subCategories', 'authors', 'publishers'));
   }


   public function getSubcategories(Request $request)
   {
       // Fetch subcategories based on the selected category ID
       $subCategories = SubCategoryModel::where('category_id', $request->category_id)->get();

       // Return JSON response to AJAX request
       return response()->json($subCategories);
   }

   public function bookSearch(Request $request)
   {
       $query = $request->input('query');
       $category = $request->input('category');
       $subCategory = $request->input('subCategory');
       $author = $request->input('author');
       $publisher = $request->input('publisher');
   
       // Query the books table
       $books = BookModel::query()
           ->when($query, function ($q) use ($query) {
               $q->where('id', $query)
                 ->orWhere('name', 'like', "%{$query}%");
           })
           ->when($category, function ($q) use ($category) {
            $q->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category); // Explicit table reference
            });
        })                 
           ->when($subCategory, function ($q) use ($subCategory) {
            $q->whereHas('subcategories', function ($query) use ($subCategory) {
                $query->where('subcategories.id', $subCategory); // Explicit table reference
            });
        })
        
        ->when($author, function ($q) use ($author) {
            $q->where('author_id', $author); // Direct relationship
        })
        ->when($publisher, function ($q) use ($publisher) {
            $q->where('publisher_id', $publisher); // Direct relationship
        })
           ->get();
   
       // Pass the results to a view
       return view('panel.search.results', compact('books'));
   }
   
}