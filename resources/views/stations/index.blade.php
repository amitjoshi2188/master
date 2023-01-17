@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Stations Listing') }}</div>

                <div class="card-body">
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Stations Information</h2>
                                </div>
                                <div class="pull-right mb-2">
                                    <a class="btn btn-success" href="{{ route('stations.create') }}"> Add station</a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>station Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stations as $station)
                                <tr>
                                    <td>{{ $station->id }}</td>
                                    <td>{{ $station->name }}</td>
                                    <td>
                                        <form action="{{ route('stations.destroy',$station->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('stations.edit',$station->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $stations->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection