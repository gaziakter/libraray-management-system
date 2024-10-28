<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\StudentModel;
use App\Models\BookIssueModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:1',
        ]);

        $query = $request->input('query');

        // Search for books by name, author, or publisher
        $books = BookModel::where('name', 'like', "%$query%")
            ->orWhere('author', 'like', "%$query%")
            ->orWhereHas('publisher', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->get();

        // Search for students by name or phone
        $students = StudentModel::where('student_name', 'like', "%$query%")
            ->orWhere('father_name', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->get();

        // Search book issues by book or student information
        $issues = BookIssueModel::with(['book', 'student'])
            ->whereHas('book', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->orWhereHas('student', function ($q) use ($query) {
                $q->where('student_name', 'like', "%$query%");
            })
            ->get();

        return view('panel.search.results', compact('books', 'students', 'issues', 'query'));
    }
}
