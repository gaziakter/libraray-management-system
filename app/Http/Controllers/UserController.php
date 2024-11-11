<?php

// UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        // Fetch all users with their roles
        $getRecord = User::with('role')->get();

        return view('panel.user.list', compact('getRecord'));
    }

    public function create()
    {
        // Retrieve all roles to populate the dropdown
        $roles = RoleModel::all();
        return view('panel.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validation rules, including username
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create the user
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username; // Save username
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id; // Assuming role_id is stored in users table
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

        // Show the edit form
        public function edit($id)
        {
            $user = User::findOrFail($id); // Retrieve the user by ID
            $roles = RoleModel::all(); // Fetch all roles for the dropdown
    
            return view('panel.user.edit', compact('user', 'roles'));
        }

           // Handle the update
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Update the user with new values
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }
}

