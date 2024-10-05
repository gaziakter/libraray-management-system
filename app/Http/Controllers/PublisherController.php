<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublisherModel;

class PublisherController extends Controller
{
    public function list(){

        $data['getRecord'] = PublisherModel::getRecord();
        return view('panel.publisher.list', $data);
    }
}
