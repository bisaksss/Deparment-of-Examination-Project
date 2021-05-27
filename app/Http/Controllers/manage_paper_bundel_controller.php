<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use APP\manage_paper_bundle;



class manage_paper_bundel_controller extends Controller
{
    
    /*public function store(request $request)
    {

        $this->validate($request,[

         'task'=>'required|max:100|min:5', 

        ]);
        //dd($request->all());
        $task=new task;
        $task->task=$request->task;
        $task->save();

        $data=task::all();
        //dd($data);
        //return redirect()->back();
        //return view('/task');
        return view('task')->with('task',$data);
    }*/


        public function store(request $request)
        {

           // dd($request->all());
           $ol_paper_details=new ol_paper_details;
           $ol_paper_details->bundle_no=$request->bundle_number;
           $ol_paper_details->paper_quntity=$request->paper_quntity;
           $ol_paper_details->year=$request->year;
           $ol_paper_details->writing_place=$request->writing_place;
           $ol_paper_details->medium=$request->medium;
           $ol_paper_details->subject=$request->subject;
           $ol_paper_details->save();

           return view('ol_paper_bundel');
           
        }
    
}
 