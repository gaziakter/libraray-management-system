<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\BloodModel;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    //show student list
    public function list(){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('student-list', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to access student.');
        }

        $getRecord = StudentModel::getRecord();
        return view('panel.student.list', compact('getRecord'));
    }

    // add student
    public function add(){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('add-student', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to add student.');
        }

        $getBlood = BloodModel::getRecord();

        return view('panel.student.add', compact('getBlood'));
    }

    public function insert(Request $request){

            // Validate the request data
            $request->validate([
            'student_name' => 'required|unique:students,student_name,|string|max:255',
            'father_name' => 'required|string|max:255',
            'student_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'blood_group' => 'nullable|string|max:10',
            'education_qualification' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female,other',
            ]);    
            
            $saveData = new StudentModel();

            // Set the data details
            $saveData->student_name = $request->student_name;
            $saveData->father_name = $request->father_name;
            $saveData->address = $request->address;
            $saveData->phone = $request->mobile;
            $saveData->email = $request->email;
            $saveData->date_of_birth = $request->date_of_birth;
            $saveData->blood_id = $request->blood_group;
            $saveData->education_qualification = $request->education_qualification;
            $saveData->gender = $request->gender;

            $saveData->slug = strtolower(str_replace(' ', '-', $request->student_name));
            

            if ($request->file('student_photo')) {

                $takeimg = $request->file('student_photo');

                // create image manager with desired driver
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()).'.'.$takeimg->getClientOriginalExtension();  // 3434343443.jpg
               
                // read image from file system
                $img = $manager->read($takeimg);
                $img = $img->resize(200, 200);
                $img->toJpeg(80)->save(base_path('public/assets/upload/student/'.$name_gen));
                $saveData->photo = $name_gen;
 
            }
            $saveData->save();
    
            // Redirect with success message
            return redirect('panel/student')->with('success', 'Student Successfully Created');

    }

    //show book list
    public function details($id){
        $GetData = StudentModel::with(['blood'])->findOrFail($id);
        return view('panel.student.details', compact('GetData'));
    }

    public function edit($id){

        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('edit-student', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to edit student.');
        }

        $getBlood = BloodModel::getRecord();

        $GetData = StudentModel::with(['blood'])->findOrFail($id);
        return view('panel.student.edit', compact('GetData', 'getBlood'));
    }

    public function update(Request $request, $id)
    {
        // Validate input fields
        $request->validate([
            'student_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'blood_group' => 'nullable',
            'education_qualification' => 'nullable|string',
        ]);

        // Find the student by ID
        $student = StudentModel::findOrFail($id);

        // Update student details
        $student->student_name = $request->student_name;
        $student->father_name = $request->father_name;
        $student->email = $request->email;
        $student->phone = $request->mobile;
        $student->address = $request->address;
        $student->date_of_birth = Carbon::parse($request->date_of_birth);
        $student->gender = $request->gender;
        $student->blood_id = $request->blood_group;
        $student->education_qualification = $request->education_qualification;

        // Generate a slug from the student's name
        $student->slug = strtolower(str_replace(' ', '-', $request->student_name));

        // Handle photo upload if provided
        if ($request->hasFile('student_photo')) {
            // Delete old photo if it exists
            if ($student->photo && File::exists(public_path('assets/upload/student/' . $student->photo))) {
                File::delete(public_path('assets/upload/student/' . $student->photo));
            }

            // Upload new photo
            $file = $request->file('student_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/upload/student'), $filename);
            $student->photo = $filename;
        }

        // Save updated data
        $student->save();

            // Redirect with success message
            return redirect('panel/student')->with('success', 'Student Successfully Updated');
    }

    public function delete($id)
    {   
        //Permission 
        $permissionrole = PermissionRoleModel::getPermission('delete-student', Auth::user()->role_id);
        if(empty($permissionrole)){
            return redirect()->back()->with('error', 'You do not have permission to delete student.');
        }

        // Find the student by ID
        $student = StudentModel::findOrFail($id);

        // Delete student photo if it exists
        if ($student->photo && File::exists(public_path('assets/upload/student/' . $student->photo))) {
            File::delete(public_path('assets/upload/student/' . $student->photo));
        }

        // Delete the student record from the database
        $student->delete();

        // Redirect with a success message
        return redirect('panel/student')->with('success', 'Student deleted successfully!');
    }
}
