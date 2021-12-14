<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Course;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Program::all()->toArray();
        $reviews = Program::with('course')->get();
        return $reviews;
       
       // $reviews = Program::all()->toArray();
       // return array_reverse($reviews);
    }
    public function course()
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
     * @param  \App\Http\Requests\StoreProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramRequest $request)
    {
        $validated = $request->validate([
           
            'course_id' =>  'required|numeric',
            'review_type' => 'required',
            'promo' => 'required|max:255',
            'price' => 'required|numeric'
        ]);
        
    
        
        $programs = new Program([
            'course_id' => $request->course_id,
            'review_type' => $request->review_type,
            'promo' => $request->promo,
            'price' => $request->price
        ]);
        $programs->save();

        return response()->json('The Review program successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prog = Program::find($id);
        return response()->json($prog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramRequest  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateProgramRequest $request)
    {
        $prog = Program::find($id);
        $prog->update($request->all());

        return response()->json('The book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        
        $program->delete();

        return response()->json('The Program successfully deleted');
    }
}
