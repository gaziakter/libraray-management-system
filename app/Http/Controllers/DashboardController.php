<?php

namespace App\Http\Controllers;

use App\Models\AuthorModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
        //
        public function dashboard(){

            $getAuthor = AuthorModel::all();
            $author = $getAuthor->count();

            return view('panel.dashboard', compact('author'));
    
        }
}
