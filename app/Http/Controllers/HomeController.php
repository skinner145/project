<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMailable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
   {
       $user = Auth::user();

       if($user->hasRole('admin')) {
           $route = 'admin.home';
       }
       else if($user->hasRole('user')) {
           $route = 'user.home';
       }
       else {
           throw Exception('Undefined user role');
       }
       return redirect()->route($route);
   }

    public function mail()
    {
      $name = 'Arthur';
      Mail::to('arthurskinner97@gmail.com')->send(new sendMailable($name));

      return 'Email was sent';
    }


}
