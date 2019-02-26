
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Referees (Admin view)</div>

                <div class="card-body">
                    <a href="{{ route( 'admin.referees.create' ) }}">Add</a>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Club Name</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referees as $referee)
                            <tr>
                                <td>{{ $referee->name }}</td>
                                <td>{{ $referee->club }}</td>
                                <td>{{ $referee->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.referees.show', $referee ) }}">View</a>
                                    <a href="{{ route('admin.referees.edit', $referee) }}">Edit</a>
                                    <form action="{{ route('admin.referees.destroy', $referee)}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
