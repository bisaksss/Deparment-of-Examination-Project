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


}
