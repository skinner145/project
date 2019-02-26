<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fixture;
use App\Report;

class FixtureReportsController extends Controller
{
    public function store(Fixture $fixture){

      $attributes = request()->validate([
        'homeTeamScore' => 'required',
        'awayTeamScore' => 'required',
        'report' => 'required'
    ]);

      Report::create([
        'fixture_id' => $fixture->id,
        'homeTeamScore' => request('homeTeamScore'),
        'awayTeamScore' => request('awayTeamScore'),
        'report' => request('report')
    ]);
    return back();

    }
}
