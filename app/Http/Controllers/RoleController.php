<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;

class RoleController extends Controller
{

    //show role list
    public function list(){

        $permissions = PermissionModel::orderBy('group_by')->get()
        ->groupBy('group_by');  // Grouping the results by group_by

        $roles = RoleModel::getRecord();
        return view('panel.role.list', compact('roles', 'permissions'));
    }

    //Add New Role
    public function add(){

        return view('panel.role.add');
    }   

    public function insert(Request $request)
    {
        // Validate the request data
        $request->validate([
            'role_name' => 'required|string', // Ensure the category name is unique
        ]);
    
        // Create a new instance of the CategoryModel for insertion
        $roles = new RoleModel();
    
        // Set the category details
        $roles->name = $request->role_name;
    
        // Save the new category record
        if ($roles->save()) {
            return redirect('panel/role')->with('success', 'Role Successfully Created');
        } else {
            return redirect()->back()->with('error', 'Failed to add Category');
        }
    }
}
