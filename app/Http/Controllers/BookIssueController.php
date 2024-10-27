<?php

namespace App\Http\Controllers;

use App\Models\BookIssueModel;
use App\Models\BookModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Carbon\Carbon; // Import Carbon
use Auth; // Import Auth

class BookIssueController extends Controller
{   
    public function list(){
        $issues = BookIssueModel::with(['student', 'book'])->get();
        return view('panel.bookissue.list', compact('issues'));
    }

    public function add()
    {
        $students = StudentModel::all();
        $books = BookModel::all();
        return view('panel.bookissue.add', compact('students', 'books'));
    }

    public function issue(Request $request)
{
    $request->validate([
        'student' => 'required|exists:students,id',
        'book' => 'required|exists:books,id',
        'return_date' => 'required|date|after_or_equal:issue_date',
    ]);

    // Check if the selected book is available
    $book = BookModel::find($request->book);
    if ($book->status !== 'available') {
        return redirect()->back()->with('error', 'This book is currently not available.');
    }

    // Issue the book
    BookIssueModel::create([
        'student_id' => $request->student,
        'book_id' => $book->id,
        'user_id' => auth()->id(),
        'issue_date' => Carbon::today()->toDateString(),
        'return_date' => $request->return_date,
        'status' => 'issued',
    ]);

    // Update the book's status to 'issued'
    $book->update(['status' => 'issued']);

        // Redirect with success message
        return redirect('panel/bookissue')->with('success', 'Book Issued successfully.');
}

    
}