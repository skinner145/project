
@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-7">

<div class="card">
        <div class="card-header">
          {{$fixture->homeTeam}} @if ($fixture->reports->count())
                @foreach($fixture->reports as $report)
                {{$report->homeTeamScore}}
                @endforeach
                @endif

                -

                @if ($fixture->reports->count())
                      @foreach($fixture->reports as $report)
                      {{$report->awayTeamScore}}
                      @endforeach
                      @endif
                {{$fixture->awayTeam}}</div>

        <div class="card-body">



        <div class="details">
        <table>
            <thead>
              <tr>
                  <th>Location</th>
                  <th>Referee</th>
                  <th>Date</th>

              </tr>
            </thead>

            <tbody>
              <tr>
                  <td>{{ $fixture->location }}</td>
                  <td>{{ $fixture->user->name }}</td>
                  <td>{{ Carbon\Carbon::parse($fixture->date)->toFormattedDateString() }}</td>
                  <td><a href="/fixtures/{{$fixture->id}}/edit">Edit</a></td>
              </tr>
            </tbody>


        </table>

        </div>


        @if ($fixture->reports->count())
        <br>
                <div class="report">
          Match Report:
            <div>

              @foreach($fixture->reports as $report)
              <p>{{$report->report}}</p>
              @endforeach

            </div>
            </div>
        @endif






        </div>







            @include ('errors')
        </div>

<br>

        @if ($fixture->reports->count()==0)
<div class="card">
  <div class="card-header">Report</div>
<div class="card-body">
        <form method="POST" action="/fixtures/{{ $fixture->id}}/reports">
          @csrf
          <div class="form-group row">
          <label for="homeTeamScore">Home Team Score</label>
          <input class="form-control" type="number" name="homeTeamScore">
          </div>

          <div class="form-group row">
          <label for="awayTeamScore">Away Team Score</label>
          <input class="form-control exampleFormControlSelect1" type="number" name="awayTeamScore">
          </div>

          <div class="form-group row">
          <label for="report">Report</label>
          <textarea class="form-control exampleFormControlSelect1" type="textarea" name="report" rows="3"></textarea>
          </div>

          <button class="btn btn-primary" type="submit">Create Report</button>

          @endif
        </form>
      </div>
      </div>
@endsection
