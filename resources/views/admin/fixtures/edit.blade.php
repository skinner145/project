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
@endsection
