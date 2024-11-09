<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;

class RoleController extends Controller
{

    //show role list
    public function list(){
        
        $roles = RoleModel::with('permissions')->get();
        return view('panel.role.list', compact('roles'));
    }

    //Add New Role
    public function add(){

        $permissions = PermissionModel::orderBy('group_by')->get()
        ->groupBy('group_by');  // Grouping the results by group_by

        return view('panel.role.add', compact('permissions'));
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

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'role_name' => 'required|string|max:255',
            'permission_id' => 'array', // Optional array of permissions
            'permission_id.*' => 'exists:permissions,id', // Each item must exist in permissions
        ]);

        // Create the new role
        $role = RoleModel::create([
            'name' => $request->input('role_name'),
        ]);

        // Attach the selected permissions to the role
        if ($request->has('permission_id')) {
            $role->permissions()->attach($request->input('permission_id'));
        }

        // Redirect with a success message
        return redirect('panel/role')->with('success', 'Role Successfully Created');
    }
}
