<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ol_paper_details;
use App\al_paper_details;
use App\marking_places;

class manage_paper_details_controller extends Controller
{
    public function store_ol_details(request $request)
    {

        //dd($request->all());
       $ol_paper_details=new ol_paper_details;
       $ol_paper_details->bundle_number=$request->bundle_number;
       $ol_paper_details->paper_quntity=$request->paper_quntity;
       $ol_paper_details->year=$request->year;
       $ol_paper_details->distric=$request->distric;
       $ol_paper_details->writing_place=$request->writing_place;
       $ol_paper_details->medium=$request->medium;
       $ol_paper_details->subject=$request->subject;
       $ol_paper_details->save();
        
       return view('ol_paper_bundel'); 
       
    }

    public function store_al_details(request $request)
    {

        $al_paper_details=new al_paper_details;

        $al_paper_details->bundle_number=$request->bundle_number;
        $al_paper_details->paper_quntity=$request->paper_quntity;
        $al_paper_details->year=$request->year;
        $al_paper_details->distric=$request->distric;
        $al_paper_details->writing_place=$request->writing_place;
        $al_paper_details->medium=$request->medium;
        $al_paper_details->subject=$request->subject;
        $al_paper_details->save();
        return view('al_paper_bundel'); 
    }

    public function store_set_marking_place_details(request $request)
    {
        
        $marking_places=new marking_places;
        $marking_places->distric=$request->distric;
        $marking_places->place=$request->place;
        $marking_places->medium=$request->medium;
        $marking_places->subject=$request->subject;
        $marking_places->paper_quntity=$request->paper_quntity;
        $marking_places->year=$request->year;

        $marking_places->save();

        return view('set_place_to_marking');


    }

    public function select_details_from_table(request $request)
    {
       $ol=$request->ol;
        $al=$request->al;
        $year=$request->year;
        
      if($ol==1)
      {
       $data=ol_paper_details::where('year',$year)->get();

       return view('genarate_qr_code')->with('table_data',$data);
          
       }
      elseif($al==2)
      {
       $data=al_paper_details::where('year',$year)->get();

       return view('genarate_qr_code')->with('table_data',$data);

     }
       
     else
     {
        $data=ol_paper_details::all();
        return view('genarate_qr_code')->with('table_data',$data);
     }
      



    }


    public function mark_as_complete($id,$exam_type)
    {   
        if($exam_type=='ol')
        {
            $complete=ol_paper_details::find($id);
            $complete->is_complete=1;
            $complete->save();
            return redirect()->back();
        }
        elseif($exam_type=='al')
        {
            $complete=al_paper_details::find($id);
            $complete->is_complete=1;
            $complete->save();
            return redirect()->back();
        }
    }

    public function mark_as_not_complete($id,$exam_type)
    {
        if($exam_type=='ol')
        {
            $complete=ol_paper_details::find($id);
            $complete->is_complete=0;
            $complete->save();
            return redirect()->back();
        }
        elseif($exam_type=='al')
        {
            $complete=al_paper_details::find($id);
            $complete->is_complete=0;
            $complete->save();
            return redirect()->back();
        }
    }




    public function delete_paper_bundle_data($id,$exam_type)
    {
        if($exam_type=='ol')
        {
            $delete=ol_paper_details::find($id);
            $delete->delete();
            return redirect()->back();
        }
        elseif($exam_type=='al')
        {
            $delete=al_paper_details::find($id);
            $delete->delete();
            return redirect()->back();
        }


    }

    public function genarate_qr_code_page($id,$exam_type)
    {

        if($exam_type=='ol')
        {
            $genarate_qr=ol_paper_details::find($id);
            return view('qr_code_page')->with('qr_data',$genarate_qr);
        
        }
        elseif($exam_type=='al')
        {
            $genarate_qr=al_paper_details::find($id);
           return view('Qr_code_page')->with('qr_data',$genarate_qr);
        }


    }


    public function show_marking_place_database()
    {
        $data=marking_places::all();
        return view('marking_places')->with('marking_place_data',$data);
    }

    public function delete_marking_place($id)
    {
        $delete=marking_places::find($id);
        $delete->delete();
        return redirect()->back();

    }


    public function select_marking_place($year,$paper_quntity,$distric,$medium,$subject,$exam_type)
    {
            return view('select_marking_place');
    }

}
