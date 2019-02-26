<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      return view('welcome');
    }

    public function create(){


      $clubs = DB::table('clubs')->pluck("name", "id");

      // $clubs = Clubs::pluck('name', 'id');

      return view('fixtures.create', compact('clubs', 'fixtures'));
    }

    public function store(Request $request){
      // $attributes = request()->validate([
      //   'homeTeam' => ['required', 'min:3'],
      //   'awayTeam' => ['required', 'min:3'],
      //   'location' => ['required', 'min:3']
      // ]);

      // Fixture::create($attributes);

      $this->validate($request, [
          'homeTeam' => 'required',
          'awayTeam' => 'required']);

      $fixture = new Fixture;
      $fixture->homeTeam = $request->input('homeTeam');
      $fixture->awayTeam = $request->input('awayTeam');
      
      $fixture->save();

      return redirect('/fixtures');
    }
}
