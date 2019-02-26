<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Fixture;
use App\Club;
use DB;
use App\Http\Controllers\Controller;

class FixtureController extends Controller
{

  public function __construct(){
    $this->middleware('auth')->except(['index', 'show']);
  }


    public function index(){
      $fixtures = Fixture::where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();;

      return view('admin.fixtures.index', compact('fixtures'));
    }

    public function pastFixtures(){
  $fixtures = Fixture::where('date', '<', date('Y-m-d'))->orderBy('date', 'asc')->get();
  return view('admin.fixtures.pastFixtures', compact('fixtures'));
  }


    public function show(Fixture $fixture){
      $clubs = DB::table('clubs')->pluck("name", "name");
      $locations = DB::table('clubs')->pluck("location", "location");
      $referees = DB::table('referees')->pluck("name", "id");



      return view('admin.fixtures.show', compact('fixture'));
    }



    public function create(){


      $clubs = DB::table('clubs')->pluck("name", "name");
      $locations = DB::table('clubs')->pluck("location", "location");
      $referees = DB::table('referees')->pluck("name", "id");
      $users = DB::table('users')->pluck("name", "id");

      // $clubs = ['0' => 'Select a team'] + collect($clubs)->toArray();

      // $clubs = Clubs::pluck('name', 'id');

      return view('admin.fixtures.create', compact('clubs', 'referees', 'locations', 'fixtures', 'users'));
    }


    public function store(Request $request){


      $attributes = request()->validate([
        'homeTeam' => ['required'],
        'awayTeam' => ['required',],
        'location' => ['required', 'min:3'],
        'user_id' => ['required'],
        'date' => ['required'],
      ]);

      $fixture=Fixture::create($attributes);


      return redirect('admin.fixtures.index');
    }


    public function edit(Fixture $fixture){

      return view('admin.fixtures.edit', compact('fixture'));

    }


    public function update(Fixture $fixture){

      $fixture->update(request(['homeTeam', 'awayTeam', 'location']));

      return redirect('admin.fixtures.index');
    }


    public function destroy(Fixture $fixture){
      $fixture->delete();
      return redirect('admin.fixtures.index');
    }



}
