<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\BloodModel;

class StudentController extends Controller
{
    //show student list
    public function list(){
        $getRecord = StudentModel::getRecord();
        return view('panel.student.list', compact('getRecord'));
    }

    // add student
    public function add(){

        $getBlood = BloodModel::getRecord();

        return view('panel.book.add', compact('getBlood'));
    }
}
