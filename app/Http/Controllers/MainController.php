<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;
use DB;
use Mail;
use App\Mail\SendMail;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();

class MainController extends Controller
{
    
    public function signupemail()
                {

                    return view('user.signupemail');
                }


    public function home()
                {

            $postads=DB::table('postad')
            ->wherenotExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('booked')
                      ->whereRaw('booked.postad_id = postad.postad_id');
            })
            ->orderBy('postad_id', 'DESC')
                    ->paginate(9);



                      return view('welcome',compact('postads'));
                }

    public function signup()
                 {
                     return view('signup');
                 }

   public function postad()
                {
                    return view('user.postad');
                }
                 
              //     public function notify()
              // {

              //          $id=Session::get('id');
              //          $notifications=DB::table('notification')
              //                 ->join('postad', 'notification.postad_id', '=', 'postad.postad_id')
              //                 ->where('postad.user_id',$id)
              //                 ->orderBy('notification_id', 'DESC')
              //                 ->paginate(5);
              //             return view('user.notification',compact('notifications'));
              //   }


   public function user_post()
                {


                  $user_id=Session::get('id');
                  $user_post = DB::table('postad')
                  ->where('user_id',$user_id)
                  ->get();
                  return view('user.user_post', compact('user_post'));
                }

                public function Hired_items()
                {


                  $user_id=Session::get('id');
                  $own_booking = DB::table('booked')
                  ->join('postad','postad.postad_id','=','booked.postad_id')
                  ->join('user','user.user_id','=','postad.user_id')
                  ->where('client_id',$user_id)
                  ->paginate(4);

                  $user_request = DB::table('booked')
                  ->join('postad','postad.postad_id','=','booked.postad_id')
                  ->join('user','user.user_id','=','booked.client_id')
                  ->where('postad.user_id',$user_id)
                  ->paginate(4);
                
                    return view('user.hired_items', compact('own_booking','user_request'));
                }   


    public function Hiring_request()
                {
                  $user_id=Session::get('id');
                  $result = DB::Table('prebooking')
                  ->join('postad','postad.postad_id','=','prebooking.postad_id')
                  ->join('user','user.user_id','=','prebooking.user_id')
                  ->where('postad.user_id',$user_id)
                  ->get();

          
                    return view('user.hiring_request',compact('result'));
                }

    public function User_request_detail($postad_id,$user_id)
                {
                  

                  $lresult=DB::table('prebooking')
                              ->join('postad','postad.postad_id','=','prebooking.postad_id')
                              ->join('user','user.user_id','=','prebooking.user_id')
                              ->where('prebooking.user_id',$user_id)
                              ->where('prebooking.postad_id',$postad_id)
                              ->get();
                    return view('user.user_request_detail',compact('lresult'));
                }

                  public function Unbook($booked_id)
                {

                  $postad_id=DB::table('booked')
                             ->select('postad_id')
                             ->where('booked_id',$booked_id)
                             ->get();
                  
                  
                    $unbook=DB::table('booked')->where('booked_id', $booked_id)->delete();

                     if($unbook){
                     
                    return Redirect::to('/detail'.'/'.$postad_id[0]->postad_id);
                                                }
                                         else{
                                             return view('signup');
                                           }

                }

                public function Own_booking_detail($postad_id)
                {
                 
                  $user_id=Session::get('id');
                  $lresult=DB::table('booked')
                              ->join('postad','postad.postad_id','=','booked.postad_id')
                              ->join('user','user.user_id','=','postad.user_id')
                              ->where('booked.client_id',$user_id)
                              ->where('booked.postad_id',$postad_id)
                              ->get();
                  $feedback=DB::table('feedback')
                              ->join('postad','postad.postad_id','=','feedback.postad_id')
                              ->join('user','user.user_id','=','feedback.user_id')
                              ->where('feedback.postad_id',$postad_id)
                              ->orderBy('feedback_id','DESC')
                              ->paginate(3);
                  $count=DB::table('feedback')
                              ->join('postad','postad.postad_id','=','feedback.postad_id')
                              ->join('user','user.user_id','=','feedback.user_id')
                              ->where('feedback.postad_id',$postad_id)
                              ->count(DB::raw('DISTINCT feedback.user_id'));

                    return view('user.own_booking_detail',compact('lresult','feedback','count'));
                }


                public function Rented_item_detail($booked_id)
                {
                  $postad_id=DB::table('booked')
                  ->select('postad_id') 
                  ->where('booked_id',$booked_id)
                  ->get();
                  
                
                  $lresult=DB::table('booked')
                              ->join('postad','postad.postad_id','=','booked.postad_id')
                              ->join('user','user.user_id','=','booked.client_id')
                              ->where('booked.booked_id',$booked_id)
                              ->get();


                              $feedback=DB::table('feedback')
                              ->join('postad','postad.postad_id','=','feedback.postad_id')
                              ->join('user','user.user_id','=','feedback.user_id')
                              ->where('feedback.postad_id',$postad_id[0]->postad_id)
                              ->orderBy('feedback_id','DESC')
                              ->paginate(3);
                              $count=DB::table('feedback')
                              ->join('postad','postad.postad_id','=','feedback.postad_id')
                              ->join('user','user.user_id','=','feedback.user_id')
                              ->where('feedback.postad_id',$postad_id[0]->postad_id)
                              ->count(DB::raw('DISTINCT feedback.user_id'));

                    return view('user.rented_item_detail',compact('lresult','feedback','count'));
                }



   public function user()
                {
                    return view('user.home');
                }
//SIGN UP 

   public function sign_up(Request $request)
				       {
				    	 
                    $email=Session::get('email');
                    $password=Session::get('password');


                             $result=DB::insert("insert into user(user_name,email,password,phone,address,file) value(?,?,?,?,?,?)",[$request->input('name'),$email,$password,$request->input('phone'),$request->input('adress'),$request->input('file')]);

                                         if($result){
                                            $request->session()->flush();
                                            $request->session()->regenerate();
                                             return Redirect::to('/log');
                                                }
                                         else{
                                             return view('signup');
                          					       }
   				     }


//USER PROFILE

   public function profile(Request $request)
            {

                  $email=$request->email;
                  $password=$request->password;

                       $lresult=DB::table('user')
                              ->where('email',$email)
                              ->where('password',$password)
                              ->first();   

                                   if ($lresult) {

                                      Session::put('user_name',$lresult->user_name);
                                      Session::put('id',$lresult->user_id);

                                         return Redirect::to('/user'); // return var_dump($lresult);
                                                    }
                                   else{
                            return Redirect::back()->withErrors(['Something went wrong.Please try again.']);               
                                       }
            }
// LOG OUT

   public function logout(Request $request)
            {

                  $request->session()->flush();
                  $request->session()->regenerate();
                  return Redirect::to('/'); 
            }

//POST AN ADVERTISEMENT

   public function post(Request $request)
            {

               request()->validate([
                  'pic' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',]);      

                 $imageName = time().'.'.request()->pic->getClientOriginalExtension();
                 $path = "uploads/";
                     request()->pic->move(public_path('uploads'), $imageName);
                 $imageurl= $path.$imageName ;
                 $date = Carbon::now()->toDateTimeString();

                         $postad=DB::insert("insert into pending_post(user_id,title,size,description,category,Location,price,pic,date) value(?,?,?,?,?,?,?,?,?)",[Session::get('id'),$request->input('title'),$request->input('size'),$request->input('description'),$request->input('category'),$request->input('area'),$request->input('price'),$imageurl,$date]);

                                          if($postad){
                                                      Session::flash('message', "Your post is requested to verify");
                                                return Redirect::back();
                                                         }
                                          else{
                                                      Session::flash('message', "Something went wrong");
                                                return Redirect::back();
                                                         }                                        
              }



              public function Feedback($postad_id)
                  {

                         $postad=DB::insert("insert into feedback(user_id,postad_id,comment) value(?,?,?)",[Session::get('id'),$postad_id,$_REQUEST['comment']]);

                  return Redirect::back();
                                                                      
                  }

//VIEW POST

     public function postdetail($postad_id)
              {
                    $int = (int)$postad_id;
                    $feedback=DB::table('feedback')
                              ->join('postad','postad.postad_id','=','feedback.postad_id')
                              ->join('user','user.user_id','=','feedback.user_id')
                              ->where('feedback.postad_id',$int)
                              ->orderBy('feedback_id','DESC')
                              ->paginate(3);

                    $count=DB::table('feedback')
                              ->join('postad','postad.postad_id','=','feedback.postad_id')
                              ->join('user','user.user_id','=','feedback.user_id')
                              ->where('feedback.postad_id',$int)
                              ->count(DB::raw('DISTINCT feedback.user_id'));
                              
                         if($int>=0){
                                     $postdetail=DB::table('postad')
                                     ->join('user','user.user_id','=','postad.user_id')
                                     ->where('postad.postad_id',$int)
                                     ->get();
                                   }
                       if(Session::has('id')){
                          $postad=DB::table('postad')
                                ->join('user','user.user_id','=','postad.user_id')
                                ->where('postad.user_id',Session::get('id'))
                                ->where('postad.postad_id',$int)
                                ->get();
                          $result = DB::Table('prebooking')
                          ->where('postad_id',$int)
                          ->where('user_id',Session::get('id'))
                          ->get();
                              // $lresult=DB::table('prebooking')
                              // ->where('prebooking.user_id',$id)
                              // ->where('prebooking.postad_id',$int)
                              // ->first();

                              // $booked=DB::table('booked')
                              // ->where('booked.client_id',$id)
                              // ->where('booked.postad_id',$int)
                              // ->first();

                              // $Rented_items=DB::table('booked')
                              // ->join('postad','postad.postad_id','=','booked.postad_id')
                              // ->join('user','user.user_id','=','booked.client_id')
                              // ->where('booked.postad_id',$int)
                              // ->where('postad.user_id',$id)
                              // ->first();



                           // ,'lresult','booked','Rented_items'
                      
                        return view('postdetail',compact('postdetail','postad','result','feedback','count'));
                         }
                      else{
                        return view('postdetail',compact('postdetail','feedback','count'));
                      }

              }


                     public function Delete_post($postad_id)
                            {

                                  $delete=DB::table('booked')
                                            ->where('postad_id', $postad_id)->delete();

                                  $delete=DB::table('postad')->where('postad_id', $postad_id)->delete();
                                  
                                  return redirect('/user_post')->withErrors(['The Post Has Been Deleted']);

                            }

 //REQUEST FOR BOOK
                   public function request_book($postad_id)
              {
               
                $Start_date=$_REQUEST['S_date'];
                $End_date=$_REQUEST['E_date'];

                    $int = (int)$postad_id;
                       // if($int>0){
                       //     DB::table('notification')
                       //    ->where('postad_id',$int)
                       //    ->update(['status' => 0]);
                       //            }
                    $user_id=Session::get('id');

                    $request_book=DB::insert("insert into prebooking(postad_id,user_id,start_date,end_date) value(?,?,?,?)",[$int,$user_id,$Start_date,$End_date]);
                    
                    return Redirect::back();

              }
 //CANCEL BOOK
                    public function cancel_booking_request($postad_id)
              {
                $user_id=Session::get('id');

                    $int = (int)$postad_id;
                    
                 DB::table('prebooking')->where('postad_id', $int)->delete();
                 return Redirect::back();

              }
 //VIEW BOOKING REQUEST
            public function View_hiring_request($postad_id,$user_id)
             {
             
                
                     $View_hiring_request=DB::table('prebooking')
                     ->join('user','user.user_id','=','prebooking.user_id')
                     ->join('postad','postad.postad_id','=','prebooking.postad_id')
                     ->where('prebooking.postad_id',$postad_id)
                     ->where('prebooking.user_id',$user_id)      
                     ->get();

                   return view('user.View_hiring_request_detail',compact('View_hiring_request'));

                     // return view('postdetail',compact('data'))->with('postdetail',$detail);      
              }

           public function Booking_confirm($prebooking_ID,$approve)
            {

$prebooking=DB::table('prebooking')
                     ->where('prebooking_id',$prebooking_ID)
                     ->get();

 $result=DB::insert("insert into booked(postad_id,client_id,start_date,end_date) value(?,?,?,?)",[$prebooking[0]->postad_id,$prebooking[0]->user_id,$prebooking[0]->start_date,$prebooking[0]->end_date]);

$delete=DB::table('prebooking')->where('prebooking_id', $prebooking_ID)->delete();

return redirect('/hiring_request');
            }

            public function Decline_booking_request($prebooking_ID,$decline)
            {


  $delete=DB::table('prebooking')->where('prebooking_id', $prebooking_ID)->delete();

  return redirect('/hiring_request');
            }




    
      public function User_notice()
                {

                       $Approve_post=DB::table('postad')
                                    ->where('user_id',Session::get('id'))
                                    ->where('status','1')
                                    ->get();

                       $Decline_post=DB::table('pending_post')
                                    ->where('user_id',Session::get('id'))
                                    ->where('report_type','request cancel')
                                    ->get();

                          return view('user.user_notice',compact('Approve_post','Decline_post'));
                }

      public function Approve_post_detail($postad_id)
                {
                      
                      DB::table('postad')
                          ->where('postad_id',$postad_id)
                          ->update(['status' => 0]);

                       $Approve_post_detail=DB::table('postad')
                                    ->where('postad_id',$postad_id)
                                    ->get();

                          return view('user.approve_post_detail',compact('Approve_post_detail'));
                }


                 public function decline_user_post($notification_id)
                      {

                               $int = (int)$notification_id;
                                     if($int>0){
                                     DB::table('notification')
                                    ->where('notification_id',$int)
                                    ->update(['status' => 0]);
                                                }
                               $decline_notification=DB::table('notification')
                                                  ->where('notification_id',$int)
                                                  ->get();
                                      return view('user.decline_user_post',compact('decline_notification'));
                      }
}
