<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\AuthorModel;
use App\Models\PublisherModel;
use App\Models\CagegoryModel;
use App\Models\SubCategoryModel;

class BookController extends Controller
{
    //show book list
    public function list(){
        $books = BookModel::latest()->get();
        return view('panel.book.list', compact('books'));
    }

        // add 
        public function add(){
            $data['getAuthor'] = AuthorModel::getRecord();
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

        // Insert Write
        public function insert(Request $request)
        {
       
            // Validate the request data
            $request->validate([
                'book_name' => 'required|string|unique:books,name', // Ensure the category name is unique
                'price' => 'required|decimal:2',
                'category_name' => 'required|integer',
                'sub_category_name' => 'nullable|integer',
                'author_name' => 'required|integer',
                'publisher_name' => 'required|integer',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
            ]);
           
            // Create a new instance of the CategoryModel for insertion
            $bookData = new BookModel();
        
            // Set the category details
            $bookData->name = $request->book_name;
            $bookData->price = $request->price;
            $bookData->category_id = $request->category_name;
            $bookData->sub_category_id = $request->sub_category_name;
            $bookData->writer_id = $request->author_name;
            $bookData->publisher_id = $request->publisher_name;
            $bookData->slug = strtolower(str_replace(' ', '-', $request->book_name));

        // Handle file upload if the logo is present
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/book'), $filename);
            $bookData->img = $filename;
        }
    
            // Save the new category record
            if ($bookData->save()) {
                return redirect('panel/book')->with('success', 'Book Successfully Created');
            } else {
                return redirect()->back()->with('error', 'Failed to add Writer');
            }
        }

    //show book list
    public function details($id){
        $books = BookModel::findOrFail($id);
        return view('panel.book.details', compact('books'));
    }

    public function edit($id){
        $author = AuthorModel::getRecord();
        $publisher = PublisherModel::getRecord();
        $category = CagegoryModel::getRecord();
        $subcategory = SubCategoryModel::getRecord();
        $books = BookModel::findOrFail($id);
        return view('panel.book.edit', compact('books', 'subcategory', 'category', 'publisher', 'author'));
    }

    public function update($id, Request $request){

            // Validate the request data
            $request->validate([
                'book_name' => 'required|string|unique:books,name', // Ensure the category name is unique
                'price' => 'required|decimal:2',
                'category_name' => 'required|integer',
                'sub_category_name' => 'nullable|teger',
                'author_name' => 'required|integer',
                'publisher_name' => 'required|integer',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
            ]);
             

            // Create a new instance of the CategoryModel for insertion
            $bookData = BookModel::getSingle($id);

            // Set the category details
            $bookData->name = $request->book_name;
            $bookData->price = $request->price;
            $bookData->category_id = $request->category_name;
            $bookData->sub_category_id = $request->sub_category_name;
            $bookData->author_id = $request->author_name;
            $bookData->publisher_id = $request->publisher_name;
            $bookData->slug = strtolower(str_replace(' ', '-', $request->book_name));

        // Handle file upload if the logo is present
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/book'), $filename);
            $bookData->img = $filename;
        }
    
            // Save the new category record
            if ($bookData->save()) {
                return redirect('panel/book')->with('success', 'Book Successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Failed to add Writer');
            }
    }

    public function delete($id){

        $data = BookModel::getSingle($id);
        $data->delete();

        return redirect('panel/book')->with('success', 'Book Successfully Deleted');
    }
}
