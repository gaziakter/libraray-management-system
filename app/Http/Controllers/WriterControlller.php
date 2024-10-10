<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WriterModel;

class WriterControlller extends Controller
{
        // list
        public function list(){
            $data['getRecord'] = WriterModel::getRecord();
            return view('panel.writer.list', $data);
        }
}
