<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\division;
use App\Models\district;

class Home extends Controller
{
   public function index(Request $request){
   	$divisions = division::all();
   	// $districts = district::all();
   	return view('index',compact('divisions'));
   } 

   public function getDivision(Request $request){
   $did = $request->post('did');
   $districts = district::where('division_id',$did)->get();
   $html ='<option value="">Select District</option>';
   foreach ($districts as $list) {
   	$html.='<option value="'.$list->id.'">'.$list->district.'</option>';
   }
   echo $html;
   }
}