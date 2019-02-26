<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;
use App\Club;
use DB;
use Carbon\Carbon;
use App\Mail\FixtureCreated;
use App\Events\FixtureWasCreated;

class FixturesController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){


      $fixtures = Fixture::where('user_id', auth()->id())->where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();

      return view('fixtures.index', compact('fixtures'));
    }


    public function pastFixtures(){
  $fixtures = Fixture::where('user_id', auth()->id())->where('date', '<', date('Y-m-d'))->orderBy('date', 'asc')->get();
  return view('fixtures.pastFixtures', compact('fixtures'));
}


    public function show(Fixture $fixture){
      $clubs = DB::table('clubs')->pluck("name", "name");
      $locations = DB::table('clubs')->pluck("location", "location");
      $referees = DB::table('referees')->pluck("name", "id");
      $users = DB::table('users')->pluck("name", "id");

      //$referees = Referees::with('referee')->paginate(20);


      return view('fixtures.show', compact('fixture'));
    }



    public function create(){


      $clubs = DB::table('clubs')->pluck("name", "name");
      $locations = DB::table('clubs')->pluck("location", "location");
      $referees = DB::table('referees')->pluck("name", "id");
      $users = DB::table('users')->pluck("name", "id");

      // $clubs = ['0' => 'Select a team'] + collect($clubs)->toArray();

      // $clubs = Clubs::pluck('name', 'id');


      return view('fixtures.create', compact('clubs', 'referees', 'locations', 'fixtures', 'users'));
    }


    public function store(Request $request){



      $attributes = request()->validate([
        'homeTeam' => ['required'],
        'awayTeam' => ['required',],
        'location' => ['required', 'min:3'],
        'user_id' => ['required'],
        'date' => ['required'],
      ]);

      $fixture = Fixture::create($attributes);

      event(new FixtureWasCreated($fixture));



      return redirect('/fixtures');
    }


    public function edit($id){



      $clubs = DB::table('clubs')->pluck("name", "name");
      $locations = DB::table('clubs')->pluck("location", "location");
      $referees = DB::table('referees')->pluck("name", "id");
      $users = DB::table('users')->pluck("name", "id");

      $fixture = Fixture::find($id);
      return view('fixtures.edit', compact('fixture', 'clubs', 'locations', 'referees', 'users'));

    }


    public function update(Request $request, $id){
      //
      // $clubs = DB::table('clubs')->pluck("name", "name");
      // $locations = DB::table('clubs')->pluck("location", "location");
      // $referees = DB::table('referees')->pluck("name", "id");
      //
      //
      // $fixture->update(request(['homeTeam', 'awayTeam', 'location', 'referee_id', 'date']));



      $fixture = Fixture::find($id);
      $fixture->homeTeam = $request->input('homeTeam');
      $fixture->awayTeam = $request->input('awayTeam');
      $fixture->location = $request->input('location');
      $fixture->user_id = $request->input('user_id');
      $fixture->date = $request->input('date');
      $fixture->save();

      return redirect('/fixtures');
    }


    public function destroy(Fixture $fixture){
      $fixture->delete();
      return redirect('/fixtures');
    }



}
