<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $data['status'] = 'ok';
        $data['students'] = DB::table('students')->get();  //query builder

        return response()->json($data);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //using query builder
        $data = array();
        $data['semester_id'] = $request->semester_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $request->photo;
        $data['gender'] = $request->gender;
        $data['address'] = $request->address;

        DB::table('students')->insert($data);
        return response('student added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = DB::table('students')->where('id',$id)->first();
        return response()->json($view);
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
        //using query builder
        $data = array();
        $data['semester_id'] = $request->semester_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $request->photo;
        $data['gender'] = $request->gender;
        $data['address'] = $request->address;

        DB::table('students')->where('id',$id)->update($data);
        return response('student updated with id '.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = DB::table('students')->where('id',$id)->first();
        $img_path = $img->photo; //get image path
        unlink($img_path);  //image deleted from folder

        DB::table('students')->where('id',$id)->delete(); //delete data from database
        return response('student deleted with id '.$id);
    }
}
