<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\AuthorModel;
use App\Models\PublisherModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\PermissionRoleModel;
use Auth;

class BookController extends Controller
{
    //show book list
    public function list(){
        $permissionrole = PermissionRoleModel::getPermission('book-list', Auth::user()->role_id);
        if(empty($permissionrole)){
            abort('404');
        }
        $books = BookModel::latest()->get();
        return view('panel.book.list', compact('books'));
    }

        // add 
        public function add(){

        //     $books = Book::with('subcategories')->get();
        //     return view('books.index', compact('books'));

        //    $categories = CagegoryModel::with('subcategories')->get();
            $getAuthor = AuthorModel::getRecord();
            $getPublisher = PublisherModel::getRecord();

        $categories = CategoryModel::with('subcategories')->get();
        //return view('books.create', compact('categories'));

            return view('panel.book.add', compact( 'categories', 'getPublisher', 'getAuthor'));
        }
        
        // public function getSubcategories($category_id) {
            
        //     // Fetch subcategories based on category ID
        //     $subcategories = SubCategoryModel::where('category_id', $category_id)->get();
        
        //     // Return subcategories as JSON
        //     return response()->json($subcategories);
        // }

        // Insert Write
        public function insert(Request $request)
        {
       
            // Validate the request data
            $request->validate([
                'book_name' => 'required|string|unique:books,name', // Ensure the category name is unique
                'price' => 'required|decimal:2',
                'categories' => 'required|array',
                'categories.*' => 'exists:categories,id',
                'subcategories' => 'required|array',
                'subcategories.*' => 'exists:subcategories,id',
                'author_name' => 'required|integer',
                'publisher_name' => 'required|integer',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, must be an image file
            ]);
           
            // Create a new instance of the CategoryModel for insertion
            $bookData = new BookModel();
        
                    // Attach the selected categories and subcategories


            // Set the category details
            $bookData->name = $request->book_name;
            $bookData->price = $request->price;
            $bookData->author_id = $request->author_name;
            $bookData->publisher_id = $request->publisher_name;
            $bookData->status = 'available';
            
            $bookData->slug = strtolower(str_replace(' ', '-', $request->book_name));


        // Handle file upload if the logo is present
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();  // 3434343443.jpg
            $file->move(public_path('assets/upload/book'), $filename);
            $bookData->img = $filename;
        }
    
        // Save the book data first
        if ($bookData->save()) {
            // Attach categories and subcategories AFTER the book is saved
            $bookData->categories()->attach($request->categories);
            $bookData->subcategories()->attach($request->subcategories);

            return redirect('panel/book')->with('success', 'Book Successfully Created');
        } else {
            return redirect()->back()->with('error', 'Failed to add Book');
        }

    }

    //show book list
    public function details($id){
        $books = BookModel::with(['categories', 'subcategories', 'author', 'publisher'])->findOrFail($id);
        return view('panel.book.details', compact('books'));
    }

    public function edit($id){
        $books = BookModel::with('categories.subcategories')->findOrFail($id);
        $categories = CategoryModel::with('subcategories')->get();
        $authors = AuthorModel::all();
        $publishers = PublisherModel::all();
    
        $selectedCategories = $books->categories->pluck('id')->toArray();
        $selectedSubcategories = $books->categories->flatMap(function ($category) {
            return $category->subcategories->pluck('id');
        })->toArray();
    
        return view('panel.book.edit', compact('books', 'categories', 'authors', 'publishers', 'selectedCategories', 'selectedSubcategories'));
    }

    public function update($id, Request $request)
    {
        // Validate the request data
        $request->validate([
            'book_name' => 'required|string|unique:books,name,' . $id, // Unique except for current book
            'price' => 'required|numeric|min:0',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'subcategories' => 'required|array',
            'subcategories.*' => 'exists:subcategories,id',
            'author_name' => 'required|exists:authors,id',
            'publisher_name' => 'required|exists:publishers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional file upload
        ]);
    
        // Find the book by ID or return 404 if not found
        $book = BookModel::findOrFail($id);
    
        // Update book details
        $book->name = $request->book_name;
        $book->price = $request->price;
        $book->author_id = $request->author_name;
        $book->publisher_id = $request->publisher_name;
        $book->status = 'available';
        $book->slug = strtolower(str_replace(' ', '-', $request->book_name));
    
        // Handle file upload if a new image is provided
        if ($request->hasFile('photo')) {
            // Delete old image if it exists
            if ($book->img && file_exists(public_path('assets/upload/book/' . $book->img))) {
                unlink(public_path('assets/upload/book/' . $book->img));
            }
    
            // Upload new image
            $file = $request->file('photo');
            $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/upload/book'), $filename);
            $book->img = $filename;
        }
    
        // Save the updated book
        $book->save();
    
        // Sync categories and subcategories
        $book->categories()->sync($request->categories);
        $book->subcategories()->sync($request->subcategories);
    
        // Redirect with success message
        return redirect('panel/book')->with('success', 'Book updated successfully.');
    }

    public function delete($id)
    {
        // Find the book by ID or return 404 if not found
        $book = BookModel::findOrFail($id);
    
        // Delete the associated image if it exists
        if ($book->img && file_exists(public_path('assets/upload/book/' . $book->img))) {
            unlink(public_path('assets/upload/book/' . $book->img));
        }
    
        // Detach categories and subcategories from the pivot tables
        $book->categories()->detach();
        $book->subcategories()->detach();
    
        // Delete the book record from the database
        $book->delete();
    
        // Redirect to book listing page with a success message
        return redirect('panel/book')->with('success', 'Book deleted successfully.');
    }
}
