<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index(){

        $students= Student::paginate(5);
        return view ('welcome')->with('students',$students);
    }

    public function create(){
        return view ('create');
    }

    public function edit($id){
        $student= Student::find($id);
        return view('edit')->with('student',$student);
    }


    public function store(Request $request){
        //form validation field

        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
       ]);

     //data insert into database table section
       $student= new Student;

       $student->first_name= $request->firstname;
       $student->last_name= $request->lastname;
       $student->email= $request->email;
       $student->phone= $request->phone;
       
       $student->save();
       return redirect(route('home'))->with('successMsg','Student Added Successfully');

    }


    public function update(Request $request,$id){
         
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
       ]);

     //data update into database table section
       $student= Student::find($id);

       $student->first_name= $request->firstname;
       $student->last_name= $request->lastname;
       $student->email= $request->email;
       $student->phone= $request->phone;
       
       $student->save();
       return redirect(route('home'))->with('successMsg','Student Updated Successfully');

    }

    public function delete($id){

        $student= student::find($id);
        $student->delete();

        return redirect(route('home'))->with('successMsg','Student Delete Successfully');

    }
}
