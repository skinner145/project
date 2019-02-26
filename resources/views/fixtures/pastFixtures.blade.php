@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-7">

<div class="card">
    <div class="card-header"><a href="/fixtures">Upcoming Assignments</a>  <aa class="cardlink">Past Assignments</aa></div>

    <div class="card-body">




  <table>
  <thead>
      <tr>
          <th>Home Team</th>
          <th>Away Team</th>
          <th>Date</th>
          <th></th>
      </tr>
  </thead>

  <tbody>
  @foreach ($fixtures as $fixture)
      <tr>
          <td>{{$fixture->homeTeam}}</td>
          <td>{{$fixture->awayTeam}}</td>
          <td>{{ Carbon\Carbon::parse($fixture->date)->toFormattedDateString() }}</td>
          <td><a href="/fixtures/{{ $fixture->id}}">View Fixture</a></td>
      </tr>
  @endforeach
  </tbody>


  </table>


</div>
</div>


</div>
@endsection
