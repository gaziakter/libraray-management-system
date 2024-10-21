<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;

class StudentController extends Controller
{
    //show book list
    public function list(){
        $getRecord = StudentModel::getRecord();
        return view('panel.student.list', compact('getRecord'));
    }
}
