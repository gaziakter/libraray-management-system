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

    //insert role functionality
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

    //Edit role
    public function edit($id)
{
    // Fetch the role by ID, including its associated permissions
    $role = RoleModel::with('permissions')->findOrFail($id);

    // Fetch all permissions and group them as needed
    $permissions = PermissionModel::all()->groupBy('group_by');

    return view('panel.role.edit', compact('role', 'permissions'));
}

//update role
public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'role_name' => 'required|string|max:255',
        'permission_id' => 'array', // Ensure permission_id is an array
    ]);

    // Find the role and update its name
    $role = RoleModel::findOrFail($id);
    $role->name = $request->input('role_name');
    $role->save();

    // Update the role's permissions
    $role->permissions()->sync($request->input('permission_id', [])); // Use sync to update permissions

    return redirect()->route('panel.role')->with('success', 'Role updated successfully');
}

// Delete role
public function destroy($id)
{
    // Find the role by ID
    $role = RoleModel::findOrFail($id);

    // Detach any associated permissions before deleting to avoid constraint issues
    $role->permissions()->detach();

    // Delete the role
    $role->delete();

    return redirect()->route('panel.role')->with('success', 'Role deleted successfully');
}


}
