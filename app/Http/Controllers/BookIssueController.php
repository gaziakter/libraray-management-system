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
        'issue_date' => 'required|date',
        'return_date' => 'required|date|after_or_equal:issue_date',
    ]);

    BookIssueModel::create([
        'student_id' => $request->student,
        'book_id' => $request->book,
        'user_id' => auth()->id(), // Logged-in user issuing the book
        'issue_date' => Carbon::today()->toDateString(), // Use today's date
        'return_date' => $request->return_date,
        'status' => 'issued',
    ]);

        // Redirect with success message
        return redirect('panel/bookissue')->with('success', 'Book Issued successfully.');
}

    
}
