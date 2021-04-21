<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Mail;
use App\Mail\SendMail;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
              {
                 return view('home');
              }
//CATEGORY

     public function Category(Request $request)
            {
        
                  $category=$request->category;
                  $area=$request->area;
                  $min_price=$request->min_price;
                  $max_price=$request->max_price;

                       $lresults=DB::table('postad')
                              ->where('category',$category)
                              ->orwhere('Location',$area)
                              ->whereBetween('price', [$min_price, $max_price])
                              ->get();

                                if($lresults) {
                                     return view('category',compact('lresults'));
                                         }
                                         else{
                                           return Redirect::back()->withErrors(['No Result Found']);               
                                         }                           
            }

//EMAIL VERIFIACTION START

     public function verify(Request $request)
             {

                $code = mt_rand(100000, 999999);
                         Session::put('verification_code', $code);
                $email = $request->email;
                $password = $request->password;

                     $lresult=DB::table('user')
                                  ->where('email',$email)
                                  ->first();

                            if($lresult){
                               Session::flash('message', "This email has been used already. Try another email ");
                               return Redirect::back();         }
                            else{
                                 Session::put('password', $password);
                                 Session::put('email', $email);
                                     $data = array('code' => $code);

                          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                 Mail::to($email)->send(new SendMail($data));
                                 print_r(Session::get('verification_code')); 
                                 return view('user.verification')->withErrors(['A verification code has sent to your email', 'The Message']);
                                  } else {
                                    Session::flash('message', "This email is not valid. Try with valid one ");
                               return Redirect::back();
                                  }

                                
                                }                
            }


     public function verificationotp(Request $request)
                {
                    $code=$request->code;
                    Session::get('verification_code');
                    if ($code==Session::get('verification_code')) {
                        return Redirect::to('/reg'); 
                                }
                }

//EMAIL VERIFIACTION END


//SEARCH POST
    public function search()
                {

                    $q = input::get('q');
                    if($q !=""){
                        $search = DB::table('postad')
                        ->where('title','LIKE','%'.$q.'%')
                        ->orWhere('description','LIKE','%'.$q.'%')
                        ->get();

                         if(count($search)>0){
                            return view('basic.search')->withDetails($search)->withQuery($q);
                               }
                               else{
                            return Redirect::back()->with('search', ['Result Not Found']);
                                   }
                         }
                    else{
                            return Redirect::back();
                         }     
                 }
}
