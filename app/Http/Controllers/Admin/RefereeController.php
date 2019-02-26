<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Referee;
use App\Club;
use App\Http\Controllers\Controller;

class RefereeController extends Controller
{
    public function index()
    {
        $referees = Referee::all();

        return view('admin.referees.index')->with([
            'referees' => $referees
        ]);
    }

    public function create()
    {
        $clubs = Club::all();

        return view('admin.referees.create')->with([
            'clubs' => $clubs
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:100',
            'rank' => 'required|max:100',
            'club_id' => 'required|integer|exists:clubs,id'
        ]);

        $b = new Referee();
        $b->name = $request->input('name');
        $b->email = $request->input('email');
        $b->password = $request->input('password');
        $b->rank = $request->input('rank');
        $b->club_id = $request->input('club_id');
        $b->save();

        return redirect()->route('admin.referees.index');
    }

    public function show($id)
    {
        $referee = Referee::findOrFail($id);

        return view('admin.referees.show')->with([
            'referee' => $referee
        ]);
    }

    public function edit($id)
    {
        $referee = Referee::findOrFail($id);
        $clubs = Club::all();

        return view('admin.referees.edit')->with([
            'referee' => $referee,
            'clubs' => $clubs
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:100',
            'rank' => 'required|max:100',
        ]);

        $b = Referee::findOrFail($id);
        $b->name = $request->input('name');
        $b->email = $request->input('email');
        $b->password = $request->input('password');
        $b->rank = $request->input('rank');
        $b->save();

        return redirect()->route('admin.referees.index');
    }

    public function destroy($id)
    {
        $referee = Referee::findOrFail($id);

        $referee->delete();

        return redirect()->route('admin.referees.index');
    }
}
