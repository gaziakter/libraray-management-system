<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\BloodModel;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StudentController extends Controller
{
    //show student list
    public function list(){
        $getRecord = StudentModel::getRecord();
        return view('panel.student.list', compact('getRecord'));
    }

    // add student
    public function add(){

        $getBlood = BloodModel::getRecord();

        return view('panel.student.add', compact('getBlood'));
    }

    public function insert(Request $request){

            // Validate the request data
            $request->validate([
            'student_name' => 'required|string|max:255',
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
}
