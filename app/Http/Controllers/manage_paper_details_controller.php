<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ol_paper_details;
use App\al_paper_details;
use App\marking_places_ol;
use App\marking_places_al;

use App\admin_login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Auth;



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

    public function store_set_marking_place_details_ol(request $request)
    {
        
        $marking_places=new marking_places_ol;
        $marking_places->distric=$request->distric;
        $marking_places->place=$request->place;
        $marking_places->medium=$request->medium;
        $marking_places->subject=$request->subject;
        $marking_places->paper_quntity=$request->paper_quntity;
        $marking_places->year=$request->year;

        $marking_places->save();

        return view('set_place_to_marking_ol');


    }
    public function store_set_marking_place_details_al(request $request)
    {
        
        $marking_places=new marking_places_al;
        $marking_places->distric=$request->distric;
        $marking_places->place=$request->place;
        $marking_places->medium=$request->medium;
        $marking_places->subject=$request->subject;
        $marking_places->paper_quntity=$request->paper_quntity;
        $marking_places->year=$request->year;

        $marking_places->save();

        return view('set_place_to_marking_al');


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


    public function show_marking_place_database_ol()
    {
        $data=marking_places_ol::all();
        return view('marking_places_ol')->with('marking_place_data',$data);
    }

    public function show_marking_place_database_al()
    {
        $data=marking_places_al::all();
        return view('marking_places_al')->with('marking_place_data',$data);
    }

    public function delete_marking_place_ol($id)
    {
        $delete=marking_places_ol::find($id);
        $delete->delete();
        return redirect()->back();

    }

    public function delete_marking_place_al($id)
    {
        $delete=marking_places_al::find($id);
        $delete->delete();
        return redirect()->back();

    }



    public function select_marking_place($year,$paper_quntity,$distric,$medium,$subject,$exam_type)
    {
        
        
       if($exam_type=='ol')
        {
             
        switch($distric)
        {   

            
            case "Ampara":
          
            $data=marking_places_ol::where('distric','=','Anuradhapura')
           ->orwhere('distric','=','Jaffna')
           ->orwhere('distric','=','Kalutara')
           ->orwhere('distric','=','Kegalle')
           ->orwhere('distric','=','Kilinochchi')
           ->orwhere('distric','=','Mannar')
           ->orwhere('distric','=','Mullaitivu')
           ->orwhere('distric','=','Nuwara Eliya')
           ->orwhere('distric','=','Puttalam')
           ->orwhere('distric','=','Trincomalee')
           ->orwhere('distric','=','Vavuniya')
           ->get();


          return view('select_marking_place_ol')
          ->with('row_data',$data)
          ->with('year',$year)
          ->with('medium',$medium)
          ->with('subject',$subject)
          ->with('ppr_quntity',$paper_quntity);

            break;   

            case "Anuradhapura":


                $data=marking_places_ol::where('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
             
            case "Badulla":


                $data=marking_places_ol::where('distric','=','Anuradapura')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
                         
            case "Batticaloa":

                $data=marking_places_ol::where('distric','=','Anuradapura')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
             
            case "Colombo":

                $data=marking_places_ol::where('distric','=','Kandy')
                ->orwhere('distric','=','Matara')
                ->orwhere('distric','=','Galle')
                ->orwhere('distric','=','Kurunegala')
                ->orwhere('distric','=','Ratnapura')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Galle":

                $data=marking_places_ol::where('distric','=','Colombo')
                ->orwhere('distric','=','Kandy')
                ->orwhere('distric','=','Kurunegala')
                ->orwhere('distric','=','Gampaha')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Gampaha":

                $data=marking_places_ol::where('distric','=','Kandy')
                ->orwhere('distric','=','Matara')
                ->orwhere('distric','=','Galle')
                ->orwhere('distric','=','Ratnapura')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Hambantota":

                $data=marking_places_ol::where('distric','=','Anuradapura')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Jaffna":

                $data=marking_places_ol::where('distric','=','Anuradapura')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Kalutara":


                $data=marking_places_ol::where('distric','=','Anuradapura')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mullaitivu')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Kandy":

                $data=marking_places_ol::where('distric','=','Colombo')
                ->orwhere('distric','=','Matara')
                ->orwhere('distric','=','Galle')
                ->orwhere('distric','=','Gampaha')
                ->orwhere('distric','=','Ratnapura')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Kegalle":

                $data=marking_places_ol::where('distric','=','Anuradapura')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mullaitivu')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Kilinochchi":

                $data=marking_places_ol::where('distric','=','Anuradapura')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break; 
            case "Kurunegala":

                $data=marking_places_ol::where('distric','=','Colombo')
                ->orwhere('distric','=','Matara')
                ->orwhere('distric','=','Galle')
                ->orwhere('distric','=','Ratnapura')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;  
            case "Mannar":

                $data=marking_places_ol::where('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Trincomalee')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;  
            case "Matale":

                $data=marking_places_ol::where('distric','=','Baticaloa') 
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;  
            case "Matara":

                $data=marking_places_ol::where('distric','=','Colombo')
                ->orwhere('distric','=','Kandy')
                ->orwhere('distric','=','Kurunegala')
                ->orwhere('distric','=','Gampaha')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;  
            case "Monaragala":

                $data=marking_places_ol::where('distric','=','Anuradapura') 
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->orwhere('distric','=','Polonnaruwa')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;  
            case "Mullaitivu":

                $data=marking_places_ol::where('distric','=','Amapara') 
                ->orwhere('distric','=','Anuradapura')
                ->orwhere('distric','=','Badulla')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Polonnaruwa')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;  
            case "Nuwara Eliya":

                $data=marking_places_ol::where('distric','=','Amapara') 
                ->orwhere('distric','=','Anuradapura')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break; 
            
            case "Polonnaruwa":

                $data=marking_places_ol::where('distric','=','Badulla') 
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Puttalam":

                $data=marking_places_ol::where('distric','=','Badulla') 
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Mullaitivu')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Polonnaruwa')
                ->orwhere('distric','=','Trincomalee')
                ->orwhere('distric','=','Vavuniya')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Ratnapura":

                $data=marking_places_ol::where('distric','=','Gampaha')
                ->orwhere('distric','=','Kandy')
                ->orwhere('distric','=','Kurunegala')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
            case "Trincomalee":

            
                $data=marking_places_ol::where('distric','=','Badulla') 
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Mannar')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            
            break;   
            case "Vavuniya":

                $data=marking_places_ol::where('distric','=','Badulla') 
                ->orwhere('distric','=','Amapara')
                ->orwhere('distric','=','Hambanthota')
                ->orwhere('distric','=','Jaffna')
                ->orwhere('distric','=','Kalutara')
                ->orwhere('distric','=','Kegalle')
                ->orwhere('distric','=','Kilinochchi')
                ->orwhere('distric','=','Baticaloa')
                ->orwhere('distric','=','Matale')
                ->orwhere('distric','=','Monaragala')
                ->orwhere('distric','=','Nuwara Eliya')
                ->orwhere('distric','=','Puttalam')
                ->orwhere('distric','=','Polonnaruwa')
                ->get();
     
     
               return view('select_marking_place_ol')
               ->with('row_data',$data)
               ->with('year',$year)
               ->with('medium',$medium)
               ->with('subject',$subject)
               ->with('ppr_quntity',$paper_quntity);
             
            break;   
                                                                                                                                                                                                                                          


        } 
        }



        if($exam_type=='al')
        {
             
            switch($distric)
            {   
    
                
                case "Ampara":
              
                $data=marking_places_al::where('distric','=','Anuradhapura')
               ->orwhere('distric','=','Jaffna')
               ->orwhere('distric','=','Kalutara')
               ->orwhere('distric','=','Kegalle')
               ->orwhere('distric','=','Kilinochchi')
               ->orwhere('distric','=','Mannar')
               ->orwhere('distric','=','Mullaitivu')
               ->orwhere('distric','=','Nuwara Eliya')
               ->orwhere('distric','=','Puttalam')
               ->orwhere('distric','=','Trincomalee')
               ->orwhere('distric','=','Vavuniya')
               ->get();
    
    
              return view('select_marking_place_al')
              ->with('row_data',$data)
              ->with('year',$year)
              ->with('medium',$medium)
              ->with('subject',$subject)
              ->with('ppr_quntity',$paper_quntity);
    
                break;   
    
                case "Anuradhapura":
    
    
                    $data=marking_places_al::where('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                 
                case "Badulla":
    
    
                    $data=marking_places_al::where('distric','=','Anuradapura')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                             
                case "Batticaloa":
    
                    $data=marking_places_al::where('distric','=','Anuradapura')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                 
                case "Colombo":
    
                    $data=marking_places_al::where('distric','=','Kandy')
                    ->orwhere('distric','=','Matara')
                    ->orwhere('distric','=','Galle')
                    ->orwhere('distric','=','Kurunegala')
                    ->orwhere('distric','=','Ratnapura')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Galle":
    
                    $data=marking_places_al::where('distric','=','Colombo')
                    ->orwhere('distric','=','Kandy')
                    ->orwhere('distric','=','Kurunegala')
                    ->orwhere('distric','=','Gampaha')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Gampaha":
    
                    $data=marking_places_al::where('distric','=','Kandy')
                    ->orwhere('distric','=','Matara')
                    ->orwhere('distric','=','Galle')
                    ->orwhere('distric','=','Ratnapura')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Hambantota":
    
                    $data=marking_places_al::where('distric','=','Anuradapura')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Jaffna":
    
                    $data=marking_places_al::where('distric','=','Anuradapura')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Kalutara":
    
    
                    $data=marking_places_al::where('distric','=','Anuradapura')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mullaitivu')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Kandy":
    
                    $data=marking_places_al::where('distric','=','Colombo')
                    ->orwhere('distric','=','Matara')
                    ->orwhere('distric','=','Galle')
                    ->orwhere('distric','=','Gampaha')
                    ->orwhere('distric','=','Ratnapura')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Kegalle":
    
                    $data=marking_places_al::where('distric','=','Anuradapura')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mullaitivu')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Kilinochchi":
    
                    $data=marking_places_al::where('distric','=','Anuradapura')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break; 
                case "Kurunegala":
    
                    $data=marking_places_al::where('distric','=','Colombo')
                    ->orwhere('distric','=','Matara')
                    ->orwhere('distric','=','Galle')
                    ->orwhere('distric','=','Ratnapura')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;  
                case "Mannar":
    
                    $data=marking_places_al::where('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Trincomalee')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;  
                case "Matale":
    
                    $data=marking_places_al::where('distric','=','Baticaloa') 
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;  
                case "Matara":
    
                    $data=marking_places_al::where('distric','=','Colombo')
                    ->orwhere('distric','=','Kandy')
                    ->orwhere('distric','=','Kurunegala')
                    ->orwhere('distric','=','Gampaha')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;  
                case "Monaragala":
    
                    $data=marking_places_al::where('distric','=','Anuradapura') 
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;  
                case "Mullaitivu":
    
                    $data=marking_places_al::where('distric','=','Amapara') 
                    ->orwhere('distric','=','Anuradapura')
                    ->orwhere('distric','=','Badulla')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;  
                case "Nuwara Eliya":
    
                    $data=marking_places_al::where('distric','=','Amapara') 
                    ->orwhere('distric','=','Anuradapura')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break; 
                
                case "Polonnaruwa":
    
                    $data=marking_places_al::where('distric','=','Badulla') 
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Puttalam":
    
                    $data=marking_places_al::where('distric','=','Badulla') 
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Mullaitivu')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->orwhere('distric','=','Trincomalee')
                    ->orwhere('distric','=','Vavuniya')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Ratnapura":
    
                    $data=marking_places_al::where('distric','=','Gampaha')
                    ->orwhere('distric','=','Kandy')
                    ->orwhere('distric','=','Kurunegala')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                case "Trincomalee":
    
                
                    $data=marking_places_al::where('distric','=','Badulla') 
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Mannar')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                
                break;   
                case "Vavuniya":
    
                    $data=marking_places_al::where('distric','=','Badulla') 
                    ->orwhere('distric','=','Amapara')
                    ->orwhere('distric','=','Hambanthota')
                    ->orwhere('distric','=','Jaffna')
                    ->orwhere('distric','=','Kalutara')
                    ->orwhere('distric','=','Kegalle')
                    ->orwhere('distric','=','Kilinochchi')
                    ->orwhere('distric','=','Baticaloa')
                    ->orwhere('distric','=','Matale')
                    ->orwhere('distric','=','Monaragala')
                    ->orwhere('distric','=','Nuwara Eliya')
                    ->orwhere('distric','=','Puttalam')
                    ->orwhere('distric','=','Polonnaruwa')
                    ->get();
         
         
                   return view('select_marking_place_al')
                   ->with('row_data',$data)
                   ->with('year',$year)
                   ->with('medium',$medium)
                   ->with('subject',$subject)
                   ->with('ppr_quntity',$paper_quntity);
                 
                break;   
                                                                                                                                                                                                                                              
    
    
            } 
        }
        
        
       

        
        
        
        
        
        
       // return view('select_marking_place');
    }

    public function mark_as_select_ol($id)
    {   
      
            $complete=marking_places_ol::find($id);
            $complete->is_complete=1;
            $complete->save();
            return redirect()->back();
       
    }

    public function mark_as_not_select_ol($id)
    {
       
            $complete=marking_places_ol::find($id);
            $complete->is_complete=0;
            $complete->save();
            return redirect()->back();
       
    }

    public function generate_qr_code_ol_marking_place($id)
    {

             $complete=marking_places_ol::find($id);
             $complete->is_complete=1;
             $complete->save();
      
            $genarate_qr=marking_places_ol::find($id);
            return view('qr_code_page_ol_for_marking')->with('qr_data',$genarate_qr);
        
       


    }

    public function mark_as_select_al($id)
    {   
      
            $complete=marking_places_al::find($id);
            $complete->is_complete=1;
            $complete->save();
            return redirect()->back();
       
    }

    public function mark_as_not_select_al($id)
    {
       
            $complete=marking_places_al::find($id);
            $complete->is_complete=0;
            $complete->save();
            return redirect()->back();
       
    }

    public function generate_qr_code_al_marking_place($id)
    {

             $complete=marking_places_al::find($id);
             $complete->is_complete=1;
             $complete->save();
      
            $genarate_qr=marking_places_al::find($id);
            return view('qr_code_page_ol_for_marking')->with('qr_data',$genarate_qr);
        
       


    }

    public function admin_register(request $request)
    {
        $admin_login= new admin_login;
        $admin_login->name=$request->name;
        $admin_login->email=$request->email;
        $hash_password = Hash::make($request->password); 
        $admin_login->password=$hash_password;
        $admin_login->save();
        return redirect()->back();
    }

    public function admin_login(request $request)
    {
        //$data=admin_login::find($request->email);
        $enter_password=$request->password; 
        $user = admin_login::where('email', '=', $request->email)->first();
        if($user)
        {
            if(Hash::check( $enter_password, $user->password))
            {
                return view('admin_dashbord')->with('user_name',$user);
            }
            else 
            {
                $error='Invalid password';
                return view('admin_login')->with('err',$error);
            }
       
            
        }
        else
        {
            $error='Invalid Email';
            return view('admin_login')->with('err',$error);
        }
        
   
   
     

    }



    public function admin_logout1(Request $request) 
    {
        Auth::logout();
        return redirect('/login');
       
    }



}
