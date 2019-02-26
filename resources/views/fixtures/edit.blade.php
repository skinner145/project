@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">Edit Fixture</div>

            <div class="card-body">

  {!! Form::open(['action' => ['FixturesController@update', $fixture->id], 'method' => 'POST']) !!}

<div class="form-group">
  {{ Form::label('homeTeam', 'Home Team' ) }}
  {{ Form::select('homeTeam', $clubs, $fixture->homeTeam, ['class' => 'select2', 'class' => 'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('awayTeam', 'Away Team') }}
  {{ Form::select('awayTeam', $clubs, $fixture->awayTeam, ['class' => 'select2', 'class' => 'form-control']) }}

<div class="form-group">
  {{ Form::label('location', 'Location') }}
  {{ Form::select('location', $locations, $fixture->location, ['class' => 'select2', 'class' => 'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('user_id', 'Referee') }}
  {{ Form::select('user_id', $users, $fixture->user->id, ['class' => 'select2', 'class' => 'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('date', 'Date') }}
  {{ Form::date('date', date($fixture->date), ['class' => 'select2', 'class' => 'form-control']) }}
</div>


  {{ Form::hidden('_method', 'PUT')}}
  {{ Form::submit('Submit', ['class' =>'btn', 'class' => 'btn-primary']) }}

  {!! Form::close() !!}

    <!-- <div class="field">
      <label class="label" for="homeTeam">Home Team</label>
        <div class="control">
          <input type="text" class="input" name="homeTeam" placeholder="Home Team" value="{{ $fixture->homeTeam}}" required>
        </div>
    </div>

    <div class="field">
          <label class="label" for="awayTeam">Away Team</label>

        <div class="control">
          <input type="text" class="input" name="awayTeam" placeholder="Away Team" value="{{ $fixture->awayTeam}}" required>
        </div>
    </div>

    <div class="field">
          <label class="label" for="location">Location</label>
        <div class="control">
          <input type="text" class="input" name="location" placeholder="location" value="{{ $fixture->location}}" required>
        </div>
    </div>

      <div>
          <button type="submit" class="button is-link">Update</button>
      </div>
</form> -->


  <!-- <form method="POST" action="/fixtures/{{ $fixture->id }}">
  @method('delete')
  @csrf

      <div class="field">
          <button type="submit" class="button">Delete</button>
      </div>
  </form> -->
@endsection
