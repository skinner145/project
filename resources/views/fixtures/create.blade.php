@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">Create a Fixture</div>

            <div class="card-body">

{!! Form::open(['action' => 'FixturesController@store', 'method' => 'POST']) !!}

<div class="form-group">
{{ Form::label('homeTeam', 'Home Team' ) }}
{{ Form::select('homeTeam', $clubs, null, ['placeholder' => 'Home Team', 'id' => 'ddl1', 'class' => 'select2', 'class' => 'form-control']) }}
</div>

<div class="form-group">
{{ Form::label('awayTeam', 'Away Team') }}
{{ Form::select('awayTeam', $clubs, null, ['placeholder' => 'Away Team', 'id' => 'ddl2', 'class' => 'select2', 'class' => 'form-control']) }}
</div>

<div class="form-group">
{{ Form::label('location', 'Location') }}
{{ Form::select('location', $locations, null, ['placeholder' => 'Location', 'class' => 'form-control']) }}
</div>


<div class="form-group">
{{ Form::label('user_id', 'Referee') }}
{{ Form::select('user_id', $users, null, ['placeholder' => 'Referee', 'class' => 'form-control']) }}
</div>

<div class="form-group">
{{ Form::label('date', 'Date') }}
{{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
</div>


  {{ Form::submit('Submit'), ['class' =>'btn', 'class' => 'btn-primary'] }}




    {!! Form::close() !!}


</div></div></div></div></div>


@endsection
