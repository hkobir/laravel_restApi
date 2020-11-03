<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Semester;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $semester=DB::table('semesters')->get();
       // return response()->json($semester);
     $result = Semester::all();
     return response()->json($result);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $validateData = $request->validate([
        'semester_name' => 'required|unique:semesters|max:25'
    ]);
     Semester::create($request->all());
     return response('semester added');

 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $result =  Semester::findorfail($id);
     return response()->json($result);

 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $semester = Semester::findorfail($id);
        $semester->semester_name = $request->semester_name;
        if($semester->save()){
         return response('semester updated with id '.$id);
     }
     else{
        return response('semester could not updated with id '.$id);
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
        $semester = Semester::findorfail($id);
        $delete = $semester->delete();

        if($delete){
            return response('semester deleted with id '.$id);
        }
        else{
            return response('semester could not delete with id '.$id);
        }
    }

    public function getBuses($route, $source, $destination){
        echo "Route: ".$route."<br>";
        echo "Source: ".$source."<br>";
        echo "Dest: ".$destination."<br><br><br><br>";


        // echo "JSON: <br><br>";

        // $data = array();
        // $data['route'] = $route;
        // $data['source'] = $source;
        // $data['destination'] = $destination;
        // echo response()->json($data);
    }
}
