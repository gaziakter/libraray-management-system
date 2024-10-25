<?php

namespace App\Http\Controllers;

use App\Models\BookIssueModel;
use App\Models\BookModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    public function add()
    {
        $students = StudentModel::all();
        $books = BookModel::all();
        return view('panel.bookissue.add', compact('students', 'books'));
    }
}
