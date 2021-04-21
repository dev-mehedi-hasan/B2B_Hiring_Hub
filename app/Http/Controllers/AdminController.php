<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;
use DB;
use Mail;
use Carbon\Carbon;
use App\Mail\SendMail;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function admin_login()
                {

                    return view('admin.admin_login');
                }

    public function admin_dashboard()
                {

                    return view('admin.admin_dashboard');
                }

    public function admin_login_request(Request $request)
	            {

	             
	               $email=$request->email;
	               $password=$request->password;

	                $lresult=DB::table('admin')
	                          ->where('admin_email',$email)
	                          ->where('admin_password',$password)
	                          ->first();


	                          if ($lresult) 
	                          {
	                          Session::put('admin_email',$lresult->admin_email);
	                          Session::put('admin_id',$lresult->admin_id);
	                          Session::put('admin_name',$lresult->admin_name);
	                          return Redirect::to('/admin_dashboard');
	                          }

	                          else
	                          {
	                            return redirect()->back()->with('message', 'Login Failed'); 
	             			  }
	    }

	public function logout(Request $request)
               {
			        $request->session()->flush();
			        $request->session()->regenerate();

			          return Redirect::to('/admin');
		       } 

    public function Admin_notification()
               {

                	 $lresult=DB::table('pending_post')
                	        ->where('report_type',NULL)
	                        ->get();
	                   
                     return view('admin.notification',compact('lresult'));
                }


   

    public function Pending_post_detail($pending_post_id)
			   {
					 $int = (int)$pending_post_id;
					         if($int>=0){
					      
					           $pending_post_detail=DB::table('pending_post')
					           ->where('pending_post_id',$int)
					           ->first();
					                     }
					        
					     return view('admin.pending_post_detail',compact('pending_post_detail'));

					                
			   }


    public function Approve($pending_post_detail_id,$approve)
			   {

					 $pending_post_detail=DB::table('pending_post')->where('pending_post_id',                 
					                       	$pending_post_detail_id)->get();

			 	     $result=DB::insert("insert into postad(user_id,title,size,description,category,location,price,pic) value(?,?,?,?,?,?,?,?)",[$pending_post_detail[0]->user_id,$pending_post_detail[0]->title,$pending_post_detail[0]->size,$pending_post_detail[0]->description,$pending_post_detail[0]->category,$pending_post_detail[0]->Location,$pending_post_detail[0]->price,$pending_post_detail[0]->pic]);


                  	 $delete=DB::table('pending_post')->where('pending_post_id', $pending_post_detail_id)->delete();

			         return redirect('/admin_notification')->with('message', 'The Post is Approved');
			   }


	public function Decline($pending_post_detail_id,$decline)
			   {

					 $update=DB::table('pending_post')
			            ->where('pending_post_id', $pending_post_detail_id)
			            ->update(['report_type' => "request cancel"]);

                       return redirect('/admin_notification')->with('message', 'The Post has been Declined');

					 
			   }



    public function Review_feedback()
            {

    	             $feedback = DB::table('feedback')
	    			  ->join('postad','postad.postad_id','=','feedback.postad_id')
	    			  ->join('user','user.user_id','=','feedback.user_id')
	    	          ->get();
    	              return view('admin.review_feedback',compact('feedback'));

            } 


    public function Delete_user($postad_id)
		   {

					   	$user_id=DB::table('postad')
			            ->where('postad_id', $postad_id)
			           ->get();
echo "<pre>";
print_r($user_id);
exit();
                       return Redirect::back()->withErrors(['The User has been deleted successfully']);

					 
		   }

    public function Delete_post($postad_id)
		   {

					   	$delete=DB::table('postad')->where('postad_id', $postad_id)->delete();

                       return Redirect::back()->withErrors(['The post has been deleted successfully']);

		 }

}
