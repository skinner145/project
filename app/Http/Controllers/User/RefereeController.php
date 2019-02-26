<?php

namespace App\Http\Controllers\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Referee;
use App\Club;
use App\Http\Controllers\Controller;

class RefereeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    public function index()
    {
        $referees = Referee::all();

        return view('user.referee.index')->with([
            'referees' => $referees
        ]);
    }

    public function show($id)
    {
        $referee = referee::findOrFail($id);

        return view('user.referee.show')->with([
            'referee' => $referee
        ]);
    }

}
