<?php

namespace App\Http\Controllers\API;

use Session;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{
    public function add(Request $request)
    {
       
       // try {
                $students =new Student([
                    'course_id' => $request->course_id,
                    'role_id' => 2,
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'mname' => $request->mname,
                    'number' => $request->pnumber, 
                    'sufix' => $request->suffix, 
                    'email' => $request->email,
                    'password' => Hash::make($request->Password)
                    // $students->course_id = $request->course_id;
                    // $students->role_id=2;
                    // $students->fname = $request->fname;
                    // $students->lname = $request->lname;
                    // $students->mname = $request->mname;
                    // $students->suffix = $request->sufix;
                    // $students->email = $request->email;
               
                    //$students->password = Hash::make($request->password);
                ]);
                $students->save();
                $success = true;
                $message = 'User register successfully';
          
             
           // } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
               // $message = $ex->getMessage();
         //   }

               
               
                
       
    
            // response
            $response = [
                'success' => $success,
                'message' => $message,
            ];
            return response()->json($response);
        }
       
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
