<?php

namespace App\Http\Controllers;

use App\Models\BookIssueModel;
use App\Models\BookModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Carbon\Carbon; // Import Carbon
use Auth; // Import Auth
use App\Models\PermissionRoleModel;

class BookIssueController extends Controller
{   
    public function list(){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('book-issue-list', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to access book issue.');
        }
        $issues = BookIssueModel::with(['student', 'book'])->latest()->get();
        return view('panel.bookissue.list', compact('issues'));
    }

    public function add()
    {
        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('book-issue', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to issue book.');
        }

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

    /**
     * Show the form for returning the book.
     */
    public function return($id)
    {   
        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('return-book', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to return book.');
        }

        $issue = BookIssueModel::findOrFail($id);
        return view('panel.bookissue.return', compact('issue'));
    }

    /**
     * Handle the return of a book.
     */
    public function returnBook(Request $request, $id)
    {
        $issue = BookIssueModel::findOrFail($id);

        // Update book issue status to returned
        $issue->update([
            'status' => 'returned',
            'actual_return_date' => Carbon::today()->toDateString(),
        ]);

        // Update the book's status to 'available'
        BookModel::where('id', $issue->book_id)->update(['status' => 'available']);

        // Redirect with success message
        return redirect('panel/bookissue')->with('success', 'Book Return successfully.');
    }


    

    public function specificBookIssue($id)
    {   
        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('book-issue', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to return book.');
        }

        $students = StudentModel::all();
        $books = BookModel::where('status', 'available')->get();
        $selectedBookId = $id; // Pass the specific book ID to the view
    
        return view('panel.bookissue.specific', compact('books', 'students', 'selectedBookId'));
    }

    public function returnSpecificBook($bookId)
    {

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('return-book', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to return book.');
        }

        $bookIssue = BookIssueModel::where('book_id', $bookId)->where('status', 'issued')->first();
    
        if (!$bookIssue) {
            return redirect()->back()->with('error', 'This book is not currently issued.');
        }
    
        return view('panel.bookissue.specificreturn', compact('bookIssue'));
    }

    public function spereturnBook(Request $request, $bookIssueId)
{
    $bookIssue = BookIssueModel::findOrFail($bookIssueId);

    // Update book issue status to returned and set actual return date
    $bookIssue->update([
        'status' => 'returned',
        'actual_return_date' => Carbon::today()->toDateString(),
    ]);

    // Update the book's status to 'available'
    BookModel::where('id', $bookIssue->book_id)->update(['status' => 'available']);

    // Redirect with a success message
    return redirect('panel/bookissue')->with('success', 'Book returned successfully.');
}


    
    

    
}
