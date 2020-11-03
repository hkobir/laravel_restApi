<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $result = Section::all();
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

            'section_name' => 'required|unique:sections|max:25',
            'sectioin_adviser' => 'required|max:25'
        ]);
Section::create($request->all());
return response('section added');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result =  Section::findorfail($id);
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
       $section = Section::findorfail($id);
       $status = $section->update($request->all());
       if($status){
           return response('section updated with id '.$id);
       }
       else{
        return response('section could not updated with id '.$id);
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
       $section = Section::findorfail($id);
       $delete = $section->delete();

       if($delete){
        return response('section deleted with id '.$id);
    }
    else{
        return response('section could not delete with id '.$id);
    }
}
}
