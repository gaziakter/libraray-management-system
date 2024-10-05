<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublisherModel;

class PublisherController extends Controller
{   
    //show publisher list
    public function list(){

        $data['getRecord'] = PublisherModel::getRecord();
        return view('panel.publisher.list', $data);
    }

    //
    public function add(){

        return view('panel.publisher.add');
    }    
}
