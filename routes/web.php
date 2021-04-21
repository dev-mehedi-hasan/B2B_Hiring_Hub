<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'MainController@home');



Route::post('/verification','HomeController@verify');
Route::post('/verificationotp','HomeController@verificationotp');



Route::post('/search','HomeController@search');

Route::get('user_post', 'MainController@user_post');
Route::get('hired_item', 'MainController@Hired_items');
Route::get('/hiring_request', 'MainController@Hiring_request');

Route::post('/category','HomeController@Category');

// LOG IN/SIGN UP/LOGOUT
Route::get('/signupemail', 'MainController@signupemail');
Route::get('/reg', 'MainController@signup');
Route::post('/usersignup','MainController@sign_up');
Route::get('/log', function()
{
    return view('login');
});
Route::post('/userlogin','MainController@profile');
Route::get('/out', 'MainController@logout');
// User
// Route::get('/user',MainController@login {
//     return view('parent_dashboard');
// });

Route::get('/user', 'MainController@user');
Route::get('/user_notice', 'MainController@User_notice');
Route::get('/postad', 'MainController@postad');
Route::post('/add-post','MainController@post');
Route::post('user_feedback/{postad_id}', 'MainController@Feedback');
// Route::get('/postedad','MainController@postedad');



//product detail

Route::get('approve_post_detail/{postad_id}', 'MainController@Approve_post_detail');
Route::get('user_request_detail/{postad_id}/{user_id}', 'MainController@User_request_detail');
Route::get('own_booking_detail/{postad_id}', 'MainController@Own_booking_detail');
Route::get('rented_item_detail/{booked_id}', 'MainController@Rented_item_detail');
Route::get('postdetail', function()
{
    return view('postdetail');
});
Route::get('/decline_user_post/{notification_id}', 'MainController@decline_user_post');

Route::get('/request_book/{postad_id}', 'MainController@request_book');
Route::get('/unbook/{booked_id}', 'MainController@Unbook');

Route::get('/detail/{postad_id}', ['uses' =>'MainController@postdetail', 'as'=>'postdetail']);

Route::get('delete_post/{postad_id}', 'MainController@Delete_post');

Route::get('/prebooking/{postid}/{userid}','MainController@prebooking')->name('prebooking');
Route::get('/cancel_booking_request/{postad_id}', ['uses' =>'MainController@cancel_booking_request', 'as'=>'cancel_booking_request']);


Route::get('view_hiring_request/{postad_id}/{user_id}', 'MainController@View_hiring_request');

Route::get('accept/{prebooking_ID}/{approve}','MainController@Booking_confirm');
Route::get('decline_booking_request/{prebooking_ID}/{decline}','MainController@Decline_booking_request');


// Admin_Section

Route::get('/admin', 'AdminController@admin_login');
Route::post('/admin_login_request','AdminController@admin_login_request');
Route::get('/admin_out', 'AdminController@logout');
Route::get('/admin_dashboard', 'AdminController@admin_dashboard');
Route::get('/admin_notification', 'AdminController@Admin_notification');
Route::get('/notification_detail/{pending_post_id}','AdminController@Pending_post_detail');
Route::get('/approve/{pending_post_detail_id}/{approve}','AdminController@Approve');
Route::get('/decline/{pending_post_detail_id}/{decline}','AdminController@Decline');
Route::get('/review_feedback','AdminController@Review_feedback');
Route::get('/delete_user/{postad_id}','AdminController@Delete_user');
Route::get('/delete_post/{postad_id}','AdminController@Delete_post');














Route::get('/home', 'HomeController@index')->name('home');
