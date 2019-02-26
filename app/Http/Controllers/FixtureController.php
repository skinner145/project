<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;
use App\Club;
use DB;
use Carbon\Carbon;
use App\Mail\Assigned;

class FixtureController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
      $fixtures = Fixture::where('user_id', auth()->id())->where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();

      return view('fixtures.index', compact('fixtures'));
    }


    public function show(Fixture $fixture){
      $clubs = DB::table('clubs')->pluck("name", "name");
      $locations = DB::table('clubs')->pluck("location", "location");
      $referees = DB::table('referees')->pluck("name", "id");
      $users = DB::table('users')->pluck("name", "id");

      //$referees = Referees::with('referee')->paginate(20);


      return view('fixtures.show', compact('fixture'));
    }





}
