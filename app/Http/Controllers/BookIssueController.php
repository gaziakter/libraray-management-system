<?php

namespace App\Http\Controllers;

use App\Models\BookIssueModel;
use App\Models\BookModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    public function index()
    {
        $bookIssues = BookIssue::with(['student', 'book', 'user'])->get();
        return view('book_issues.index', compact('bookIssues'));
    }

    public function create()
    {
        $students = Student::all();
        $books = Book::where('stock', '>', 0)->get(); // Only available books
        return view('book_issues.create', compact('students', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'issue_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:issue_date',
        ]);

        BookIssue::create([
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'user_id' => auth()->id(), // Logged-in user
            'issue_date' => $request->issue_date,
            'return_date' => $request->return_date,
            'status' => 'issued',
        ]);

        // Decrease book stock
        $book = Book::find($request->book_id);
        $book->decrement('stock');

        return redirect()->route('book_issues.index')->with('success', 'Book issued successfully!');
    }

    public function markAsReturned(BookIssue $bookIssue)
    {
        $bookIssue->update([
            'actual_return_date' => now(),
            'status' => 'returned',
        ]);

        // Increase book stock on return
        $bookIssue->book->increment('stock');

        return redirect()->route('book_issues.index')->with('success', 'Book returned successfully!');
    }
}
