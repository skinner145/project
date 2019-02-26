<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fixture;
use App\Report;

class FixtureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    public function index()
    {
              $fixtures = Fixture::where('user_id', auth()->id())->where('date', '>=', date('Y-m-d'))->orderBy('date', 'asc')->get();

        return view('fixtures.index')->with([
            'fixtures' => $fixtures
        ]);
    }

    public function show($id)
    {
        $fixture = Fixture::findOrFail($id);

        return view('fixtures.show')->with([
            'fixture' => $fixture
        ]);
    }

}
