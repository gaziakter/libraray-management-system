<?php

namespace App\Http\Controllers;

use App\Models\AuthorModel;
use App\Models\BookModel;
use App\Models\StudentModel;
use App\Models\PublisherModel;
use App\Models\BookIssueModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        //
        public function dashboard(){
            $book = BookModel::all()->count();
            $student = StudentModel::all()->count();
            $author = AuthorModel::all()->count();
            $publisher = PublisherModel::all()->count();
            $issue = BookIssueModel::all()->count();
        
            return view('panel.dashboard', compact('book', 'student', 'author', 'publisher', 'issue'));
    
        }
}
