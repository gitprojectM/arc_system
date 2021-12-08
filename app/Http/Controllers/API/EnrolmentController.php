<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Enrolment;
use App\Models\Program;
use App\Http\Requests\StoreEnrolmentRequest;
use App\Http\Requests\UpdateEnrolmentRequest;

class EnrolmentController extends Controller
{
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
     * @param  \App\Http\Requests\StoreEnrolmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnrolmentRequest $request)
    {
        $enrolments = new Enrolment([
            'stud_id' => $request->stud_id,
            'prog_id' => $request->prog_id,
            'mname' => $request->mname,
            'suffix' => $request->suffix,
            'mstatus' => $request->mstatus,
            'gender' => $request->gender,
            'bdate' => $request->bdate,
            'paddress' => $request->paddress,
            'slattended' => $request->slattended,
            'course' => $request->course,
            'termcon' => $request->termcon,
            'modepay' => $request->modepay
            
        ]);
        $enrolments->save();

        return response()->json('You havew succesfully enrolled!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrolment $enrolment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrolment $enrolment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnrolmentRequest  $request
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnrolmentRequest $request, Enrolment $enrolment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrolment $enrolment)
    {
        //
    }

    public function getprogram()
    {
        $reviews = Program::all()->toArray();
       
        return $reviews;
       
       // $reviews = Program::all()->toArray();
       // return array_reverse($reviews);
    }
}
