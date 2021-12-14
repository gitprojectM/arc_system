<?php

namespace App\Http\Controllers\API;
use App\Http\Library\ApiHelpers;
use App\Models\Course;
//use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
class CourseController extends Controller
{

    use ApiHelpers; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      
        $courses = Course::all()->toArray();
        return response()->json($courses);
       
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
   
       
            $cors = new Course([
            
                'title' => $request->title,
             
            ]);
            $cors->save();
    
            return response()->json('The Course successfully added');
      
       
   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cou = Course::find($id);
        return response()->json($cou);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cou = Course::find($id);
        $cou->update($request->all());

        return response()->json('The book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        
        $course->delete();

        return response()->json('The course successfully deleted');
    }
}
