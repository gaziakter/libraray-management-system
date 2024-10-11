<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;

class BookController extends Controller
{
    //show book list
    public function list(){
        $data['getRecord'] = BookModel::getRecord();
        return view('panel.book.list',  $data);
    }
}
