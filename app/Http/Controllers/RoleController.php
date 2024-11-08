<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    //show role list
    public function list(){

        $roles = RoleModel::getRecord();
        return view('panel.role.list', compact('roles'));
    }
}
