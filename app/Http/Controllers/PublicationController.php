<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicationModel;

class PublicationController extends Controller
{
    public function list(){

        $data['getRecord'] = PublicationModel::getRecord();
        return view('panel.publication.list', $data);
    }
}
