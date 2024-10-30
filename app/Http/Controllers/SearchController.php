<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\StudentModel;
use App\Models\BookIssueModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function search(){

    return view('panel.search.form');
   }
}
