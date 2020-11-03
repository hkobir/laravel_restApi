<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $result['subjects'] = Subject::all();
     return response()->json($result);
 }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'semester_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25'
        ]);

        Subject::create($request->all());
        return response('Subject added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result =  Subject::findorfail($id);
        return response()->json($result);

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
       $subject = Subject::findorfail($id);
       $status = $subject->update($request->all());
       if($status){
           return response('subject updated with id '.$id);
       }
       else{
        return response('subject could not updated with id '.$id);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $subject = Subject::findorfail($id);
       $delete = $subject->delete();

       if($delete){
        return response('subject deleted with id '.$id);
    }
    else{
        return response('subject could not delete with id '.$id);
    }
}


}
