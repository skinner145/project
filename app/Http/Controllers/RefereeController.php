<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referee;
use App\Club;
use App\Http\Controllers\Controller;

class RefereeController extends Controller
{
    public function index()
    {
        $referees = Referee::all();

        return view('referees.index')->with([
            'referees' => $referees
        ]);
    }



    public function show($id)
    {
        $referee = Referee::findOrFail($id);

        return view('referees.show')->with([
            'referee' => $referee
        ]);
    }


}
