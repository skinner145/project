@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('admin.fixtures.index') }}">Fixtures</a>
                    <a href="{{ route('admin.referees.index') }}">Referees</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
