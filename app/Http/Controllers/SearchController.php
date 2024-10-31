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

   public function bookSearch(Request $request)
    {
        // Get the search parameters from the request
        $query = $request->input('query');
        $category = $request->input('category');
        $subCategory = $request->input('subCategory');
        $author = $request->input('author');
        $publisher = $request->input('publisher');

        // Query the books table with filters
        $books = BookModel::query()
            ->when($query, function ($q) use ($query) {
                $q->where('id', $query)
                  ->orWhere('name', 'like', "%{$query}%");
            })
            ->when($category, function ($q) use ($category) {
                $q->whereHas('categories', function ($query) use ($category) {
                    $query->where('name', $category);
                });
            })
            ->when($subCategory, function ($q) use ($subCategory) {
                $q->whereHas('subCategories', function ($query) use ($subCategory) {
                    $query->where('name', $subCategory);
                });
            })
            ->when($author, function ($q) use ($author) {
                $q->where('author_id', $author);
            })
            ->when($publisher, function ($q) use ($publisher) {
                $q->whereHas('publisher', function ($query) use ($publisher) {
                    $query->where('name', $publisher);
                });
            })
            ->get();

        // Pass the results to a view
        return view('panel.search.results', compact('books'));
         }
}
